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
                                Add Employee
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <form action="{{ route('#updateEmployee') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" class="form-control" style="display: none" value="{{ $employee->employee_id }}" placeholder="" name="employeeId">

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ $employee->employee_name }}" placeholder="" name="name">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="image" id="" value="{{ $employee->image }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="phone" id="" value="{{ $employee->phone }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            {{-- <input type="text" name="" id="" class="form-control"> --}}
                                            <textarea name="address" id="" cols="30" rows="5" class="form-control">{{ $employee->address }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-3 col-form-label">Salary</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="salary" id="" value="{{ $employee->salary }}" class="form-control">
                                        </div>
                                    </div>

                                    <p class="row offset-1 col-12">
                                        <span class="col-3">
                                            <a href="{{ route('#employeeList') }}"><button type="button" class="btn btn-dark">Back</button></a>
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