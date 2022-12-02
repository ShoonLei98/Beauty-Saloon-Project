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
                                    <a href="{{ route('#addExpense1') }}">
                                        <button class="btn btn-sm btn-outline-dark">Add Daily Expense</button>
                                    </a>
                                </h3>
                                <span class="col-3"></span>
                                <h3 class="card-title mt-2 col-2">
                                    <a href="{{ route('#expense1') }}">
                                        <button class="btn btn-sm btn-outline-dark active">Daily Expense</button>
                                    </a>
                                </h3>
                                <h3 class="card-title mt-2 ml-3 col-2">
                                    <a href="{{ route('#expense2') }}">
                                        <button class="btn btn-sm btn-outline-dark">Monthly Expense</button>
                                    </a>
                                </h3>
                                <h3 class="card-title mt-2 ml-3 col-2">
                                    <a href="{{ route('#expense3') }}">
                                        <button class="btn btn-sm btn-outline-dark">Yearly Expense</button>
                                    </a>
                                </h3>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>From Date</td>
                                        <td>To Date</td>
                                        <td>Daily Expense</td>
                                        <td>Amount</td>
                                        <td>Description</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expense as $item)
                                    <tr>
                                        <td>{{ $item->expense_id }}</td>
                                        <td>{{ $item->from_date }}</td>
                                        <td>{{ $item->to_date }}</td>
                                        <td>{{ $item->expense }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            <a href="{{ route('#editExpense1', $item->expense_id) }}"><button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button></a>
                                            <a href="{{ route('#deleteExpense1', $item->expense_id) }}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
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