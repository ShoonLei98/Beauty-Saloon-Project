@extends('Layouts.app')
 @section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            @if (Session::has('createSuccess'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ Session::get('createSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
    
            @if (Session::has('updateSuccess'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ Session::get('updateSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
    
            @if (Session::has('deleteSuccess'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ Session::get('deleteSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
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
                                        <td>Voucher Code</td>
                                        <td>Date</td>
                                        <td>Total</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($saleInvoice as $item)
                                        <tr>
                                            <td>{{ $item->voucher_id }}</td>
                                            <td>{{ $item->voucher_code }}</td>
                                            <td>{{ $item->date }}</td>
                                            <td>{{ $item->total }}</td>
                                            <td>
                                                <a href="{{ route('#editSaleInvoice', ['voucherId' => $item->voucher_id, 'voucherCode' => $item->voucher_code]) }}"><button class="btn btn-sm bg-secondary text-white">Edit</i></button></a>
                                                <a href="{{ route('#editSaleInvoice', ['voucherId' => $item->voucher_id, 'voucherCode' => $item->voucher_code]) }}"><button class="btn btn-sm bg-warning text-white">Delete Item</i></i></button></a>
                                                <a href="{{ route('#deleteSaleInvoice', ['voucherId' => $item->voucher_id, 'voucherCode' => $item->voucher_code]) }}"><button class="btn btn-sm bg-danger text-white">Delete Voucher</i></i></button></a>
                                            </td>
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