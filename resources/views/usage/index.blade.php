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
                            <div class="row">
                                <h3 class="card-title mt-2 col-3">
                                    <a href="{{ route('#addUsage') }}">
                                        <button class="btn btn-sm btn-outline-dark">Add Usage</button>
                                    </a>
                                </h3>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Date</td>
                                        <td>Item</td>
                                        <td>Price</td>
                                        <td>Quantity</td>
                                        <td>Description</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usage as $item)
                                        <tr>
                                            <td>{{ $item->usage_id }}</td>
                                            <td>{{ $item->date }}</td>
                                            <td>{{ $item->item }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                <a href="{{ route('#editUsage', $item->usage_id) }}"><button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button></a>
                                                <a href="{{ route('#deleteUsage', $item->usage_id) }}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
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