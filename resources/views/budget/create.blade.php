@extends('adminlte::page')

@section('title', 'New Budget')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="m-0 text-dark">
                New Budget
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}"> Dashboard</a>
                </li>
                <li class="breadcrumb-item active">New Budget</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <form method="POST" action="{{ route('budgets.store') }}">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Date</label>
                        <input type="date" class="form-control" id="date" name="datte">
                    </div>



                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Type Transaction</label>
                        <select id="transaction_category_id" name="transaction_category_id" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="sub_category_id">Sub Category</label>
                        <select id="sub_category_id" name="sub_category_id" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save Budget</button>
            </div>
        </form>
    </div>
@stop
