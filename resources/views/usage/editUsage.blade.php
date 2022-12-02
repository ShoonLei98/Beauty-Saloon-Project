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
                                Accessory Usage
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <form action="{{ route('#updateUsage') }}" method="POST" class="form-horizontal">
                                    @csrf
                                    <div class="" style="display: none">
                                        <input type="text" name="usageId" id="" value="{{ $usage->usage_id }}" class="form-control">
                                    </div>        
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Date</label>
                                        <div class="col-sm-9">
                                            {{-- <input type="text" name="" id="" class="form-control"> --}}
                                            <input type="date" name="date" id="" value="{{ $usage->date }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Item</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="item" value="{{ $usage->item }}" class="form-control" placeholder="">
                                        </div>
                                    </div>                                   

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="price" value="{{ $usage->price }}" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Quantity</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="quantity" value="{{ $usage->quantity }}" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                           <textarea name="description" cols="30" rows="3" class="form-control">{{ $usage->description }}</textarea>
                                        </div>
                                    </div>

                                    <p class="row offset-1 col-12">
                                        <span class="col-3">
                                            <a href="{{ route('#usageList') }}"><button type="button" class="btn btn-dark">Back</button></a>
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