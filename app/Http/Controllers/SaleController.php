<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Sale;
use App\Models\Counter;
use App\Models\SaleVoucher;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function ajaxData()
    {
        $item = Item::where('remove_status', 1)->get();
        return response()->json(['item' => $item]);
    }

    public function index()
    {
        $saleInvoice = SaleVoucher::select('voucher_id', 'date')
                                  ->where('remove_status', 1)->groupBy('voucher_id','date')
                                  ->get();
        return view('Invoice.sale.index')->with(['saleInvoice' => $saleInvoice]);
    }

    public function addSaleInvoice()
    {
        $item = Item::where('remove_status', 1)->get();
        return view('Invoice.sale.addSale')->with(['data' => $item]);
    }

    public function createSaleInvoice(Request $request)
    {
        logger($request->date);
        $saleVoucher = [
            'date' => $request->date,
            'tax' => $request->tax,
            'total' => $request->total,
        ];
        SaleVoucher::create($saleVoucher);

        $data = $request->data;
        for ($i=0; $i < count($data); $i++) { 
            $sale = $data[$i];
            $saleData = $this->getSaleItem($sale);
            Sale::create($saleData);
        }
        return response()->json(['status' => 'success']);
        // return redirect()->route('#purchaseList')->with(['createSuccess' => 'Created Successfully']);
    }

    //get data to insert or update 
    protected function getSaleItem($request)
    {
        $data = [
            'item' => $request['item'],
            'price' => $request['price'],
            'quantity' => $request['quantity'],
            'discount' => $request['discount'],
            'cash_percent' => $request['cash_percent'],
            'sub_total' => $request['sub_total'],
            'remove_status' => 1,
        ];
        return $data;
    }
}
