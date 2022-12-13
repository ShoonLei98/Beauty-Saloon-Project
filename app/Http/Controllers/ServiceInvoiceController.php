<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Item;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceInvoice;

class ServiceInvoiceController extends Controller
{
    public function ajaxServiceList()
    {
        $employee = Employee::where('remove_status', 1)->get();
        $service = Service::where('remove_status', 1)->get();
        return response()->json(['employee' => $employee, 'service' => $service]);
    }

    public function serviceInvoice()
    {
        $data = ServiceInvoice::get();
        $service = Service::where('remove_status', 1)->get();
        $item = Item::where('remove_status', 1)
                    ->where('available_status', 1)
                    ->get();
        return view('Invoice.service.index')->with(['invoice' => $data, 'data' => $item, 'service' => $service]);
    }

    public function addServiceInvoice()
    {
        return view('Invoice.service.addServiceInvoice');
    }

    public function createSerivceInvoice(Request $request)
    {
        $data = [
            'customer_name' => $request->customerName,
            'checkout_status' => 0
        ];
        // dd($data);
        ServiceInvoice::create($data);
        return redirect()->route('#serviceInvoice');
    }

    public function addNewService(Request $request)
    {
        dd('Hello there');
    }
}
