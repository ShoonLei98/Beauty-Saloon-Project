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
                                Add Customer
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <form action="{{ route('#createCustomer') }}" method="POST" class="form-horizontal">
                                    @csrf
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="" name="name">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="phone" id="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea name="address" id="" cols="30" rows="3" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Member Card</label>
                                        <div class="col-sm-9">
                                            {{-- <input type="text" name="card" id="" class="form-control"> --}}
                                            <select name="card" id="" class="form-control">
                                                @foreach ($card as $item)
                                                    <option value="{{ $item->card_id }}">{{ $item->card_number }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">From Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="fDate" id="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">To Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="tDate" id="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Service</label>
                                        <div class="col-sm-9">
                                            <select name="service" id="" class="form-control">
                                                <option value="">Choose Service</option>
                                                @foreach ($service as $item)
                                                <option value="{{ $item->service_id }}">{{ $item->service_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Discount</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="discount" id="" class="form-control">
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