<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ServiceController extends Controller
{
    public function index()
    {
        $data = Service::where('remove_status', 1)->get();
        return view('serivces.index')->with(['service' => $data]);
    }

    public function createService(Request $request)
    {
        $service = $this->getServiceData($request);
        Service::create($service);
        return redirect()->route('#serviceList')->with(['createSuccess' => 'Service added successfully']);
    }

    public function editService($id)
    {
        $service = Service::where('service_id', $id)->first();
        return view('serivces.editService')->with(['service' => $service]);
    }

    public function updateService(Request $request)
    {
        $service = $this->getServiceData($request);
        Service::where('service_id', $request->serviceId)->update($service);
        return redirect()->route('#serviceList')->with(['updateSuccess' => 'Service updated successfully']);        
    }

    public function deleteService($id)
    {
        Service::where('service_id', $id)->update(['remove_status' => 0]);
        return back()->with(['deleteSuccess' => 'Service Deleted Successfully']);
    }

    public function getServiceData($request)
    {
        $data = [
           'service_name' => $request->name,
           'price' => $request->price,
           'discount' => $request->discount,
           'from_date' => $request->fDate,
           'to_date' => $request->tDate,
           'percentage' => $request->percent,
           'name_percentage' => $request->namePercent,
           'remove_status' => 1
        ];
        return $data;
    }
}
