<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class InventoryController extends Controller
{
    public function index()
    {
        // $data = Item::where('remove_status', 1)->get();

        if(Session::has('ITEM'))
        {
            Session::forget('ITEM');
        }

        $inventory = Purchase::select('purchases.item as item_id','items.item as item_name', DB::raw('sum(purchases.quantity)as quantity'))
                             ->leftjoin('items', 'items.item_id', '=', 'purchases.item')
                             ->where('items.remove_status', 1) 
                             ->where('purchases.remove_status', 1)
                             ->groupBy('purchases.item', 'items.item')
                             ->get();
        // dd($inventory->toArray());
        return view('inventory.index')->with(['inventory' => $inventory]);
    }

    public function searchItem(Request $request)
    {
        $data = Item::select('items.item_id as item_id', 'items.item as item_name', DB::raw('sum(purchases.quantity) as quantity'))
                    ->leftJoin('purchases', 'purchases.item', 'items.item_id')
                    ->where('purchases.remove_status', 1)
                    ->where('items.remove_status', 1)
                    ->where('items.item', 'like', '%'.$request->searchItem.'%')
                    ->groupBy('items.item_id', 'items.item')
                    ->get();
        Session::put('ITEM', $request->searchItem);
        return view('inventory.index')->with(['inventory' => $data]);
    }
}
