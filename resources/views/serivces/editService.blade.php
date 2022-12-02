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
                                Add Service
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <form action="{{ route('#updateService') }}" class="form-horizontal" method="POST">
                                    @csrf
                                    <input type="text" name="serviceId" id="" value="{{ $service->service_id }}" style="display: none">
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control" placeholder="" value="{{ $service->service_name }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="price" id="" class="form-control" value="{{ $service->price }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Discount</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="discount" id="" class="form-control" value="{{ $service->discount }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">From Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="fDate" value="{{ $service->from_date }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">To Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="tDate" value="{{ $service->to_date }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Percentage</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="percent" id="" class="form-control" value="{{ $service->percentage }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">By Name Percentage</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="namePercent" id="" class="form-control" value="{{ $service->name_percentage }}">
                                        </div>
                                    </div>

                                    <p class="row offset-1 col-12">
                                        <span class="col-3">
                                            <a href="{{ route('#serviceList') }}"><button type="button" class="btn btn-dark">Back</button></a>
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
@section('jscript')
    <script>
        function date()
        {
            let value = $('#f_date').val();
            if (value == "") {
                // alert('hi');
                $("#f_date").datepicker.("setDate", null);
            }
        }
    </script>
@endsection