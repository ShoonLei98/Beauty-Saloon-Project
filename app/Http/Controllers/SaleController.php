<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Item;
use App\Models\Counter;
use App\Models\SaleVoucher;
use Illuminate\Http\Request;
use App\Models\SaleVoucherDetail;

class SaleController extends Controller
{
    // for promotion auto fill
    public function ajaxData(Request $request)
    {
        $date = $request->date;
        $item = $request->itemID;

        //for item input field
        $item = Item::select('items.*','promotions.discount as promotion')
                    ->leftjoin('promotions', 'promotions.item', 'items.item_id')
                    ->where('items.item_id', $item)
                    ->where('promotions.remove_status', 1)
                    ->where('from_date', '<=', $date)
                    ->where('to_date', '>=', $date)
                    ->first();

        return response()->json(['item' => $item]);
    }

    public function ajaxItemList()
    {
        $itemList = Item::where('remove_status', 1)
        ->where('available_status', 1)
        ->get();

        return response()->json(['itemList' => $itemList]);
    }

    // sale main page
    public function index()
    {
        $saleInvoice = SaleVoucher::where('remove_status', 1)->get();
        return view('Invoice.sale.index')->with(['saleInvoice' => $saleInvoice]);
    }

    // for addSale view to show data
    public function addSaleInvoice()
    {
        //for item input field
        $item = Item::where('remove_status', 1)
                    ->where('available_status', 1)
                    ->get();

         //for card input field
         $card = Card::where('remove_status', 1)->get();
        return view('Invoice.sale.addSale')->with(['data' => $item, 'card' => $card]);
    }

    //save voucher and voucher detail info to database
    public function createSaleInvoice(Request $request)
    {
        //save data to save_voucher table
        $saleVoucher = [
            'voucher_code' => $request->voucherCode,
            'date' => $request->date,
            'tax' => $request->tax,
            'total' => $request->total,
            'remove_status' => 1
        ];
        SaleVoucher::create($saleVoucher);

        //save voucher detail to save_voucher_detail table
        $data = $request->data;
        for ($i=0; $i < count($data); $i++) { 
            $sale = $data[$i];
            $saleData = $this->getSaleItem($sale);
            SaleVoucherDetail::create($saleData);
        }
        return response()->json(['status' => 'success']);
    }

    // direct to edit page with detail list
    public function editSaleInvoice($voucherId, $voucherCode)
    {
        $voucherId = $voucherId;
        $voucherCode = $voucherCode;
        //for item input field
        $item = Item::where('remove_status', 1)
                    ->where('available_status', 1)
                    ->get();
        
        // for voucher detail to show in table 
        $voucherDetail = SaleVoucherDetail::where('voucher_code', $voucherCode)
                                          ->where('remove_status', 1)
                                          ->get();
                                        //   logger($voucherDetail);

        //to show total and tax in table when edit
        $tblFooterData = SaleVoucher::where('voucher_id', $voucherId) 
                                    ->where('voucher_code', $voucherCode)                                          
                                    ->where('remove_status',1)
                                    ->first();
        return view('Invoice.sale.editSale')->with(['detail' => $voucherDetail, 'footerData' => $tblFooterData, 'data' => $item]);
    }

    public function updateSaleInvoice(Request $request)
    {
        //save data to save_voucher table
        $saleVoucher = [
            'voucher_code' => $request->voucherCode,
            'date' => $request->date,
            'tax' => $request->tax,
            'total' => $request->total,
            'remove_status' => 1
        ];
        SaleVoucher::where('voucher_code', $request->voucherCode)->update($saleVoucher);

        // save voucher detail info
        $data = $request->data;
        logger($data);
        for ($i=0; $i < count($data); $i++) { 
            $saleDetail = $data[$i];
            $saleDetailData = $this->getSaleItem($saleDetail);
            $id = $saleDetail['v_detail_id'];

            //to know if the row is updated or new purchase item
            if($id == NULL)
            {
                SaleVoucherDetail::create($saleDetailData);
            }
            else
            {
                SaleVoucherDetail::where('v_detail_id', $id)->update($saleDetailData);
            }

        }
        return response()->json(['status' => 'success']);
    }

    // delete voucher
    public function deleteSaleInvoice(Request $request) 
    {
        $voucherId = $request->voucherId;
        $voucherCode = $request->voucherCode;
        SaleVoucher::where('voucher_id', $voucherId)
                         ->where('voucher_code', $voucherCode)
                         ->update(['remove_status' => 0]);

        SaleVoucherDetail::where('voucher_code', $voucherCode)->update(['remove_status' => 0]);
        return back()->with(['deleteSuccess' => 'Deleted Successfully.']);
    }

    //get data to insert or update 
    protected function getSaleItem($request)
    {
        $data = [
            'voucher_code' => $request['voucher_code'],
            'date' => $request['date'],
            'item' => $request['item'],
            'price' => $request['price'],
            'quantity' => $request['quantity'],
            'promotion' => $request['promotion'],
            'sub_total' => $request['sub_total'],
            'remove_status' => 1,
        ];
        return $data;
    }
}
