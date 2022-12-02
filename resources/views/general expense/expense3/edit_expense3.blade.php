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
                                General Expense 3
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <form action="{{ route('#updateExpense3') }}" method="POST" class="form-horizontal">
                                    @csrf
                                    <input type="text" name="expenseId" value="{{ $expense->expense_id }}" class="form-control" style="display: none">

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-4 col-form-label">From Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" name="fDate" value="{{ $expense->from_date }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-4 col-form-label">To Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" name="tDate" value="{{ $expense->to_date }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-4 col-form-label">Expense</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="expense" value="{{ $expense->expense }}" class="form-control" placeholder="">
                                        </div>
                                    </div>                                   

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-4 col-form-label">Amount</label>
                                        <div class="col-sm-8">
                                            <input type="number" name="amount" value="{{ $expense->amount }}" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-4 col-form-label">Description</label>
                                        <div class="col-sm-8">
                                            <textarea name="description" id="" cols="30" rows="3" class="form-control">{{ $expense->description }}</textarea>
                                        </div>
                                    </div>

                                    <p class="row offset-1 col-12">
                                        <span class="col-3">
                                            <a href="{{ route('#expense3') }}"><button type="button" class="btn btn-dark">Back</button></a>
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