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
                                Add Item
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <form action="{{ route('#insertItem') }}" class="form-horizontal" method="POST">
                                    @csrf
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="" name="name">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Sale Available</label>
                                        <div class="col-sm-9">
                                            <div class="col">
                                                <label for="" class="col-form-label">Yes</label>
                                                <input type="radio" name="rdbSaleAble" id="" value="1">
                                            </div>
                                            <div class="col">
                                                <label for="" class="col-form-label">No</label>
                                                <input type="radio" name="rdbSaleAble" id="" value="0">
                                            </div>
                                        </div>
                                    </div>

                                    <p class="row offset-1 col-12">
                                        <span class="col-3">
                                            <a href="{{ route('#itemList') }}"><button type="button" class="btn btn-dark">Back</button></a>
                                        </span>
                                        <span class="col-5"></span>
                                        <span class="col-3">
                                            <button type="submit" class="btn btn-success text-right" style="text-align: right" onclick="date()">Save</button>
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