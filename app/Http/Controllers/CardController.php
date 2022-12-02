<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Card;
use App\Models\Service;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        $service = Service::where('remove_status', 1)->get();
        // $data = Card::select('cards.*', 'services.service_id', 'services.service_name')
        // ->LEFTJOIN('services', 'cards.service', 'services.service_id')
        // ->where('cards.remove_status', 1)
        // ->get();

        $data = Card::where('remove_status', 1)->get();

        // dd($data->toArray());
        return view('card.index')->with(['card' => $data, 'services' => $service]);
    }

    public function addCard()
    {
        $service = Service::where('remove_status', 1)->get();
        // dd($service->toArray());
        return view('card.addCard')->with(['service' => $service]);
    }

    public function createCard(Request $request)
    {
        $card = $this->getCardData($request);
        // dd($card);
        Card::create($card);
        return redirect()->route('#cardList')->with(['createSuccess' => 'Added Successfully']);
    }

    public function editCard($id)
    {
        $service = Service::where('remove_status', 1)->get();
        $card = Card::where('card_id', $id)->first();
        $selServices = explode(',', $card->service);
        // dd($selServices);
        // dd($card->toArray());
        return view('card.editCard')->with(['card' => $card, 'service' => $service, 'selServices' => $selServices]);
    }

    public function updateCard(Request $request)
    {
        $card = $this->getCardData($request);
        Card::where('card_id', $request->cardId)->update($card);
        return redirect()->route('#cardList')->with(['updateSuccess' => 'Updated Successfully']);
    }

    public function deleteCard($id)
    {
        Card::where('card_id', $id)->update(['remove_status' => 0]);
        return back()->with(['deleteSuccess' => 'Deleted Successfully']);
    }

    protected function getCardData($request)
    {
        $serviceReq = $request->service;
        // dd($serviceReq);
        $services = implode(',', $serviceReq);
        // dd($services);
        $data = [
            'card_number' => $request->card,
            'from_date' => $request->fDate,
            'to_date' => $request->tDate,
            'service' => $services,
            'discount' => $request->discount,
            'remove_status' => 1,
        ];

        return $data;
    }
}
