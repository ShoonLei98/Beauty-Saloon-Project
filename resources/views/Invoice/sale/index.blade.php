@extends('Layouts.app')
 @section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mt-2">
                                <a href="{{ route('#addSaleInvoice') }}">
                                    <button class="btn btn-sm btn-outline-dark">Add Sale Invoice</button>
                                </a>
                            </h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td>Voucher ID</td>
                                        <td>Date</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($saleInvoice as $item)
                                        <tr>
                                            <td>{{ $item->voucher_id }}</td>
                                            <td>{{ $item->date }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    
 @endsection