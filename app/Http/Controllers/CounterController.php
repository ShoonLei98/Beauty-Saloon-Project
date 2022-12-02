<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function index()
    {
        $data = Counter::where('remove_status', 1)->get();
        return view('counter.index')->with(['data' => $data]);
    }

    public function insertCounter(Request $request)
    {
        logger($request);
        $counter = [
            'counter_name' => $request->name,
            'remove_status' => 1,
        ];

        Counter::create($counter);
        return redirect()->route('#counterList')->with(['createSuccess' => 'Added Successfully']);
    }

    public function editCounter($id)
    {
        $counter = Counter::where('counter_id', $id)->first();
        return view('counter.editCounter')->with(['counter' => $counter]);
    }

    public function updateCounter(Request $request)
    {
        $counter = [
            'counter_name' => $request->name,
            'remove_status' => 1,
        ];

        Counter::where('counter_id', $request->counterId)->update($counter);
        return redirect()->route('#counterList')->with(['updateSuccess' => 'Updated Successfully']);
    }

    public function deleteCounter($id)
    {
        Counter::where('counter_id', $id)->update(['remove_status' => 0]);
        return back()->with(['deleteSuccess' => 'Deleted Successfully']);
    }
}
