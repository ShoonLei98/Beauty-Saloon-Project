<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    // promotion page
    public function index()
    {
        //get item list to show item name in index page
        $item = Item::where('remove_status', 1)
                    ->where('available_status', 1)
                    ->get();
        $tdyDate = Carbon::now()->toDateString();
        // $dd = Carbon::today();
        // dd($tdyDate);
        $data = Promotion::select('*',
                            DB::raw("(CASE WHEN from_date > '$tdyDate' OR to_date < '$tdyDate' THEN 'No'
                                           ELSE 'Yes' END) as active_status"))
                         ->where('remove_status', 1)
                         ->get();
        // dd($data->toArray());
        return view('promotion.index')->with(['promotion' => $data, 'itemData' => $item]);
    }

    // for date search
    public function dateList(Request $request)
    {
        //get item list to show item name in index page
        $item = Item::where('remove_status', 1)
                    ->where('available_status', 1)
                    ->get();
        $tdyDate = Carbon::now()->toDateString();
        $data = Promotion::select('*',DB::raw("(CASE WHEN from_date > '$tdyDate' OR to_date < '$tdyDate' THEN 'No'
                                                   ELSE 'Yes' END) as active_status"))                
                         ->where('remove_status', 1)
                         ->whereBetween('from_date', [$request->fromDate, $request->toDate] )
                         ->orwhereBetween('to_date', [$request->fromDate, $request->todate])
                         ->get();
        // dd($data->toArray());
        return view('promotion.index')->with(['promotion' => $data, 'itemData' => $item]);
    }

    // for active status select
    public function ajaxList(Request $request)
    {
        $tdyDate = Carbon::now()->toDateString();
        if($request->data == 1)
        {
            $data = Promotion::select('promotions.*','items.item as item_name',
                                      DB::raw("(CASE WHEN from_date > '$tdyDate' OR to_date < '$tdyDate' THEN 'No'
                                                ELSE 'Yes' END) as active_status"))                
                             ->leftjoin('items', 'promotions.item' , 'items.item_id')
                             ->where('promotions.remove_status', 1)
                             ->where('promotions.from_date', '<=', $tdyDate )
                             ->where('promotions.to_date', '>=', $tdyDate)
                             ->get();
                            //  logger($data->toArray());

            return response()->json(['data' => $data]);
        }
        else if($request->data == 2)
        {
            $data = Promotion::select('promotions.*','items.item as item_name',
                                      DB::raw("(CASE WHEN from_date > '$tdyDate' OR to_date < '$tdyDate' THEN 'No'
                                                ELSE 'Yes' END) as active_status"))                
                             ->leftjoin('items', 'promotions.item' , 'items.item_id')
                             ->where('promotions.remove_status', 1)
                             ->where('promotions.from_date', '>', $tdyDate )
                             ->orWhere('promotions.to_date', '<', $tdyDate)
                             ->get();
                            //  logger($data->toArray());
            return response()->json(['data' => $data]);
        }

        // dd($data->toArray());
        // return response()->json(['item']);
    }

    public function addPromotion()
    {
        $data = Item::where('available_status', 1)
                    ->where('remove_status', 1)
                    ->get();
        return view('promotion.addPromotion')->with(['data' => $data]);
    }

    public function insertPromotion(Request $request)
    {
        $data = $this->getPromotionData($request);
        Promotion::create($data);
        return redirect()->route('#promotionList')->with(['createSuccess' => 'Promotion Added Successfully']);
    }

    public function editPromotion($id)
    {
         //get item list to show item name in item select
         $item = Item::where('remove_status', 1)
                     ->where('available_status', 1)
                     ->get();
        
        //get promotion data to show in edit form
        $data = Promotion::select('promotions.*', 'items.item as item_name')
                         ->leftjoin('items', 'promotions.item', 'items.item_id')
                         ->where('promotions.promo_id', $id)
                         ->where('promotions.remove_status', 1)
                         ->where('items.remove_status', 1)
                         ->where('items.available_status', 1)
                         ->first();
        return view('promotion.editPromotion')->with(['promotion' => $data, 'data' => $item]);
    }

    public function updatePromotion(Request $request)
    {
        $data = $this->getPromotionData($request);
        Promotion::where('promo_id', $request->promoID)->update($data);
        return redirect()->route('#promotionList')->with(['updateSuccess' => "Updated Successfully."]);
    }

    public function deletePromotion($id)
    {
        Promotion::where('promo_id', $id)->update(['remove_status' => 0]);
        return back()->with(['deleteSuccess' => 'Deleted Successfully']);
    }

    protected function getPromotionData($request)
    {
        $discount = 0;
        if($request->rdbDiscount == 'cash')
        {
            $discountVal = '1';
            $discount = $request->cash;
        }
        else if($request->rdbDiscount == 'percent')
        {
            $discountVal = '0';
            $discount = $request->percent;
        }

        $data = [
            'promo_name' => $request->name,
            'item' => $request->item,
            'from_date' => $request->fromDate,
            'to_date' => $request->toDate,
            'promo_type' => $request->rdbPromotion,
            'discount_value' => $discountVal,
            'discount' => $discount,
            'counter_discount' => $request->counterDiscount,
            'shop_discount' => $request->shopDiscount,
            'remove_status' => 1
        ];

        return $data;
    }
}
