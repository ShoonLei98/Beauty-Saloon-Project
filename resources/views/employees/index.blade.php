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
                                <a href="{{ route('#addEmployee') }}">
                                    <button class="btn btn-sm btn-outline-dark">Add Employee</button>
                                </a>
                            </h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Photo</td>
                                        <td>Name</td>
                                        <td>Phone</td>
                                        <td>Address</td>
                                        <td>Salary</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employee as $item)
                                            <tr>
                                                <td>{{ $item->employee_id }}</td>
                                                <td>
                                                    <img src="{{ asset('uploads/'.$item->photo) }}" class="img-thumbnail" width="50px">
                                                </td>
                                                <td>{{ $item->employee_name }}</td>                                
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>{{ $item->salary }}</td>
                                                <td>
                                                <a href="{{ route('#editEmployee', $item->employee_id) }}"><button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button></a>
                                                <a href="{{ route('#deleteEmployee', $item->employee_id) }}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    {{-- @if ($emptyStatus == 0)
                                        <tr>
                                            <td colspan="7">
                                                <small class="text-muted">There is no data.</small>
                                            </td>
                                        </tr>

                                    @else ()
                                        

                                    @endif --}}
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