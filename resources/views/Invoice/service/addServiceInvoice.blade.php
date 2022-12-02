@extends('Layouts.app')
 @section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-body">
                                <div class="tab-content">
                                    <form action="{{ route('#createServiceInvoice') }}" method="POST" class="form-horizontal w-50 text-center">
                                        @csrf
                                        <div class="form-group row mb-3">
                                            <label for="" class="col-sm-3 col-form-label">Customer Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="customerName" placeholder="">
                                            </div>
                                        </div>
    
                                        <p class="row offset-1 col-12">
                                            <span class="col-3">
                                                <a href="{{ route('#serviceInvoice') }}"><button type="button" class="btn btn-dark">Back</button></a>
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
        </div>
    </section>
</div>
 @endsection