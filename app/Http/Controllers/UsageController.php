<?php

namespace App\Http\Controllers;

use App\Models\Usage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redis;

class UsageController extends Controller
{
    public function index()
    {
        $data = Usage::where('remove_status', 1)->get();
        return view('usage.index')->with(['usage' => $data]);
    }

    public function createUsage(Request $request)
    {
        $usage = $this->getUsageData($request);
        Usage::create($usage);
        return redirect()->route('#usageList')->with(['createSuccess' => 'Added Successfully']);
    }

    public function editUsage($id)
    {
        $usage = Usage::where('usage_id', $id)->first();
        return view('usage.editUsage')->with(['usage' => $usage]);
    }

    public function updateUsage(Request $request)
    {
        $usage = $this->getUsageData($request);
        Usage::where('usage_id', $request->usageId)->update($usage);
        return redirect()->route('#usageList')->with(['updateSuccess' => 'Updated Successfully']);
    }

    public function deleteUsage($id)
    {
        Usage::where('usage_id', $id)->update(['remove_status' => 0]);
        return back()->with(['deleteSuccess' => 'Deleted Successfully']);
    }

    protected function getUsageData($request)
    {
        $data = [
            'date' => Carbon::now(),
            'item' => $request->item,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'remove_status' => 1,
        ];
        return $data;
    }
}
