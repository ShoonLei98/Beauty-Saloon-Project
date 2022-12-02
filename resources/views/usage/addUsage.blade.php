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
                                <form action="{{ route('#createUsage') }}" method="POST" class="form-horizontal">
                                    @csrf
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Date</label>
                                        <div class="col-sm-9">
                                            {{-- <input type="text" name="" id="" class="form-control"> --}}
                                            <input type="date" name="daily" id="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Item</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="item" class="form-control" placeholder="">
                                        </div>
                                    </div>                                   

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="price" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Quantity</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="quantity" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                           <textarea name="description" id="" cols="30" rows="3" class="form-control"></textarea>
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