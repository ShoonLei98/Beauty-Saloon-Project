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
                                <a href="{{ route('#addCustomer') }}">
                                    <button class="btn btn-sm btn-outline-dark">Add Customer</button>
                                </a>
                            </h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Name</td>
                                        <td>Phone</td>
                                        <td>Address</td>
                                        <td>Card Number</td>
                                        {{-- <td>From Date</td>
                                        <td>To Date</td>
                                        <td>Service</td>
                                        <td>Discount</td> --}}
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customer as $item)
                                        <tr>
                                            <td>{{ $item->customer_id }}</td>
                                            <td>{{ $item->customer_name }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->card_number }}</td>
                                            {{-- <td>{{ $item->from_date }}</td>
                                            <td>{{ $item->to_date }}</td>
                                            <td>{{ $item->service_name }}</td>
                                            <td>{{ $item->discount }}</td> --}}
                                            <td>
                                                <a href="{{ route('#editCustomer', $item->customer_id) }}"><button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button></a>
                                                <a href="{{ route('#deleteCustomer', $item->customer_id) }}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
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