@extends('Layouts.app')
 @section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mt-2 text-center">Inventory List</h3>
                            <div class="card-tools mt-2 d-flex">
                                <form action="{{ route('#searchItem') }}" method="get" class="mt-1">
                                    @csrf
                                    <div class="input-group input-group-sm" style="width: 150px; height:50px;">
                                        <input type="text" name="searchItem" class="form-control float-right" placeholder="Search" value="{{ Session::get('ITEM') }}">
                                        <div class="input-group-append" >
                                          <button type="submit" class="btn btn-default" style="height: 27px;">
                                            <i class="fas fa-search"></i>
                                          </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Name</td>
                                        <td>Quantity</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inventory as $item)
                                    <tr>
                                        <td>{{ $item->item_id }}</td>
                                        <td>{{ $item->item_name }}</td>
                                        <td>{{ $item->quantity }}</td>
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