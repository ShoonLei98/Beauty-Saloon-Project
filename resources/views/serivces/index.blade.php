@extends('Layouts.app')
 @section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
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
                                <a href="{{ route('#addService') }}">
                                    <button class="btn btn-sm btn-outline-dark">Add Service</button>
                                </a>
                            </h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Name</td>
                                        <td>Price</td>
                                        <td>Discount</td>
                                        <td>From Date</td>
                                        <td>To Date</td>
                                        <td>Percentage</td>
                                        <td>By Name Percentage</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($service as $item)
                                        <tr>
                                            <td>
                                                {{ $item->service_id }}
                                            </td>
                                            <td>
                                                {{ $item->service_name }}
                                            </td>
                                            <td>
                                                {{ number_format($item->price) }}
                                            </td>
                                            <td>
                                                {{ $item->discount }}
                                            </td>
                                            <td>
                                                {{ $item->from_date }}
                                            </td>
                                            <td>
                                                {{ $item->to_date }}
                                            </td>
                                            <td>
                                                {{ $item->percentage }}
                                            </td>
                                            <td>
                                                {{ $item->name_percentage }}
                                            </td>
                                            <td>
                                                <a href="{{ route('#editService', $item->service_id) }}"><button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button></a>
                                                <a href="{{ route('#deleteService', $item->service_id) }}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
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