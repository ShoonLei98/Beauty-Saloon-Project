@extends('Layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid mt-5" style="width: 450px">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mt-2 text-center">
                                Edit Customer
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <form action="{{ route('#updateCustomer') }}" method="POST" class="form-horizontal">
                                    @csrf
                                    <input type="text" class="form-control" value="{{ old('name', $customer->customer_id) }}" name="customerId" style="display: none">

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ old('name', $customer->customer_name) }}" name="name">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="phone"  value="{{ old('phone', $customer->phone) }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea name="address"  cols="30" rows="3" class="form-control">{{ old('address', $customer->address) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Member Card</label>
                                        <div class="col-sm-9">
                                            {{-- <input type="text" name="card"  value="{{ old('card', $customer->card) }}" class="form-control"> --}}
                                            <select name="card" id="" class="form-control">
                                                <option value="{{ $customer->card_id }}">{{ $customer->card_number }}</option>
                                                @foreach ($card as $item)
                                                    <option value="{{ $item->card_id }}">{{ $item->card_number }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">From Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="fDate"  value="{{ old('fDate', $customer->from_date) }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">To Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="tDate"  value="{{ old('tDate', $customer->to_date) }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Service</label>
                                        <div class="col-sm-9">
                                            <select name="service" id="" class="form-control">
                                                <option value="{{ $customer->service_id }}">{{ $customer->service_name }}</option>
                                                @foreach ($service as $item)
                                                    @if ($customer->service_id != $item->service_id)
                                                        <option value="{{ $item->service_id }}">{{ $item->service_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Discount</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="discount"  value="{{ old('discount', $customer->discount) }}" class="form-control">
                                        </div>
                                    </div> --}}

                                    <p class="row offset-1 col-12">
                                        <span class="col-3">
                                            <a href="{{ route('#custoemrList') }}"><button type="button" class="btn btn-dark">Back</button></a>
                                        </span>
                                        <span class="col-5"></span>
                                        <span class="col-3">
                                            <button type="submit" class="btn btn-success text-right" style="text-align: right">Save</button>
                                        </span>
                                       </div>
                                    </p>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection