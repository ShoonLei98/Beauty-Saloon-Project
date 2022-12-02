<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $data = Item::where('remove_status', 1)->get();
        return view('item.index')->with(['data' => $data]);
    }

    public function insertItem(Request $request)
    {
        $item = [
            'item' => $request->name,
            'remove_status' => 1,
        ];

        Item::create($item);
        return redirect()->route('#itemList')->with(['createSuccess' => 'Added Successfully']);
    }

    public function editItem($id)
    {
        $item = Item::where('item_id', $id)->first();
        return view('item.editItem')->with(['item' => $item]);
    }

    public function updateItem(Request $request)
    {
        $item = [
            'item' => $request->name,
            'remove_status' => 1,
        ];

        Item::where('item_id', $request->itemId)->update($item);
        return redirect()->route('#itemList')->with(['updateSuccess' => 'Updated Successfully']);
    }

    public function deleteItem($id)
    {
        Item::where('item_id', $id)->update(['remove_status' => 0]);
        return back()->with(['deleteSuccess' => 'Deleted Successfully']);
    }
}
