<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Service;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CustomerController extends Controller
{
    public function index()
    {
        $data = Customer::select('customers.*', 'cards.card_id', 'cards.card_number')
                        ->LEFTJOIN('cards', 'cards.card_id', 'customers.card')
                        ->where('customers.remove_status', 1)
                        ->where('cards.remove_status', 1)
                        ->orderby('customers.customer_id')
                        ->get();
                        // dd($data);
        $card = Card::get();
        return view('customers.index')->with(['customer' => $data, 'card' => $card]);
    }

    public function addCustomer()
    {
        $card = Card::where('remove_status', 1)->get();
        // dd($service->toArray());
        return view('customers.addCustomer')->with(['card' => $card]);
    }

    public function createCustomer(Request $request)
    {
        $customer = $this->getCustomerData($request);
        // dd($customer);
        Customer::create($customer);
        return redirect()->route('#custoemrList')->with(['createSuccess' => 'Added Successfully']);
    }

    public function editCustomer($id)
    {
        $card = Card::where('remove_status', 1)->get();
        $customer = Customer::select('customers.*', 'cards.card_id', 'cards.card_number')
                            ->LEFTJOIN('cards', 'cards.card_id', 'customers.card')
                            ->where('customers.customer_id' , $id)
                            ->where('customers.remove_status', 1)
                            ->where('cards.remove_status', 1)
                            ->first();
        // dd($customer->toArray());
        return view('customers.editCustomer')->with(['customer' => $customer, 'card' => $card]);
    }

    public function updateCustomer(Request $request)
    {
        $customer = $this->getCustomerData($request);
        Customer::where('customer_id', $request->customerId)->update($customer);
        return redirect()->route('#custoemrList')->with(['updateSuccess' => 'Updated Successfully']);
    }

    public function deleteCustomer($id)
    {
        Customer::where('customer_id', $id)->update(['remove_status' => 0]);
        return back()->with(['deleteSuccess' => 'Deleted Successfully']);
    }

    protected function getCustomerData($request)
    {
        $data = [
            'customer_name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'card' => $request->card,
            // 'from_date' => Carbon::parse($request->fDate),
            // 'to_date' => Carbon::parse($request->tDate),
            // 'service' => $request->service,
            // 'discount' => $request->discount,
            'remove_status' => 1,
        ];

        return $data;
    }
}
