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
                                Edit Card
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <form action="{{ route('#updateCard') }}" method="POST" class="form-horizontal">
                                    @csrf
                                    <input type="text" name="cardId" value="{{ $card->card_id }}" style="display: none" class="form-control">

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Card Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="card" value="{{ $card->card_number }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">From Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="fDate" value="{{ $card->from_date }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">To Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="tDate" value="{{ $card->to_date }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Service</label>
                                        <div class="col-sm-9">
                                            <select name="service[]" id="service" class="form-control select2" multiple data-live-search="true">
                                                <option value="0">Choose Service</option>
                                                @foreach ($service as $item)
                                                    <option value="{{ $item->service_id }}"  @if (in_array($item->service_id, $selServices)) selected @endif>
                                                        {{ $item->service_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Discount</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="discount" value="{{ $item->discount }}" class="form-control">
                                        </div>
                                    </div>

                                    <p class="row offset-1 col-12">
                                        <span class="col-3">
                                            <a href="{{ route('#cardList') }}"><button type="button" class="btn btn-dark">Back</button></a>
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