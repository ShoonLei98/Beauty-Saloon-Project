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
                                <a href="{{ route('#addItem') }}">
                                    <button class="btn btn-sm btn-outline-dark">Add Item</button>
                                </a>
                            </h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Name</td>
                                        <td>Available For Sale</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->item_id }}</td>
                                        <td>{{ $item->item }}</td>
                                        <td>
                                            @if ($item->available_status == 1)
                                                Yes
                                            @elseif ($item->available_status == 0)
                                                No
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('#editItem', $item->item_id) }}"><button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button></a>
                                            <a href="{{ route('#deleteItem', $item->item_id) }}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
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