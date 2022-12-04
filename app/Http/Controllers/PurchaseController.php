<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Counter;
use App\Models\Item;
use Illuminate\Support\Facades\Redis;

use function PHPUnit\Framework\returnSelf;

class PurchaseController extends Controller
{
    //call from ajax 
    public function ajaxData()
    {
        $item = Item::where('remove_status', 1)
                    ->where('available_status', 1)
                    ->get();
        // dd($item);
        $counter = Counter::where('remove_status', 1)->get();
        // dd($counter);
        return response()->json(['item' => $item, 'counter' => $counter]);
        // return $item;
    }

    // list voucher form
    public function index()
    {
        $purchase = Purchase::select('voucher', 'date')->where('remove_status', 1)->groupBy('voucher','date')->get();
        return view('purchase.index')->with(['purchase' => $purchase]);
    }

    //process to add purchase item
    public function addPurchase()
    {
        $item = Item::where('remove_status', 1)
                    ->where('available_status', 1)
                    ->get();
        $counter = Counter::where('remove_status', 1)->get();
        return view('purchase.purchase')->with(['data' => $item, 'counter' => $counter]);
    }

    //create purchase to database
    public function createPurchase(Request $request)
    {
        $data = $request->data;

        for ($i=0; $i < count($data); $i++) { 
            $purchase = $data[$i];
            Purchase::create($purchase);
        }
        return response()->json(['status' => 'success']);
        // return redirect()->route('#purchaseList')->with(['createSuccess' => 'Created Successfully']);
    }

    //edit process of purchase item
    public function editPurchase($id)
    {
        $item = Item::where('remove_status', 1)
                    ->where('available_status', 1)
                    ->get();
        $counter = Counter::where('remove_status', 1)->get();

        //for edit view
        $purchase = Purchase::where('voucher', $id)
                            ->where('remove_status', 1)->get();

        // for tax and total column                            
        $totalData = Purchase::select('voucher', 'date', 'tax', 'total')
                                         ->where('voucher', $id)
                                         ->where('remove_status', 1)
                                         ->groupBy('voucher','date','tax','total')
                                         ->first();
        return view('purchase.editPurchase')->with(['data' => $item, 'counter' => $counter,'purchase' => $purchase, 'totalData' => $totalData]);
    }

    //update to database
    public function updatePurchase(Request $request)
    {
        $data = $request->data;
        // logger($data);
        for ($i=0; $i < count($data); $i++) { 
            $purchase = $data[$i];
            $purchaseData = $this->getPurchaseItem($purchase);
            $id = $purchase['purchaseID'];
            // logger($id);
            //to know if the row is updated or new purchase item
            if($id == NULL)
            {
                logger($purchaseData);
                Purchase::create($purchaseData);
            }
            Purchase::where('purchase_id', $id)
                    ->update($purchaseData);
        }
        return response()->json(['status' => 'success']);
    }

    //delete for purchase item in voucher
    public function deletePurchase(Request $request)
    {
        Purchase::where('purchase_id', $request->id)->update(['remove_status' => 0]);
        return response()->json(['status' => 'success']);
        // return back()->with(['deleteSuccess' => 'Deleted Successfully']);
    }

    //delete overall voucher
    public  function deleteVoucher($id)
    {
        Purchase::where('voucher', $id)->update(['remove_status' => 0]);
        return back()->with(['deleteSuccess' => 'Deleted Successfully']);
    }

    //get data to insert or update 
    protected function getPurchaseItem($request)
    {
        $data = [
            'voucher' => $request['voucher'],
            'date' => $request['date'],
            'item' => $request['item'],
            'price' => $request['price'],
            'counter' => $request['counter'],
            'counter_name' => $request['counter_name'],
            'quantity' => $request['quantity'],
            'discount' => $request['discount'],
            'sub_total' => $request['sub_total'],
            'tax' => $request['tax'],
            'total' => $request['total'],
            'remove_status' => 1,
        ];
        return $data;
    }
}
