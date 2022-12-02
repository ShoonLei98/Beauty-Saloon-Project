<?php

namespace App\Http\Controllers;

use App\Models\ServiceInvoice;
use Illuminate\Http\Request;

class ServiceInvoiceController extends Controller
{
    public function serviceInvoice()
    {
        $data = ServiceInvoice::get();
        return view('Invoice.service.index')->with(['data' => $data]);
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
