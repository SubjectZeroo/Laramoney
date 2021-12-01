@extends('adminlte::page')

@section('title', 'New Account')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="m-0 text-dark">
                New Account
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}"> Dashboard</a>
                </li>
                <li class="breadcrumb-item active"> New Account</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <form method="POST" action="{{ route('transactions.store') }}">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="amount">Balance</label>
                        <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="reference">Account Number</label>
                        <input type="text" class="form-control" id="reference" name="reference" placeholder="Reference">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description"></textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save Account</button>
            </div>
        </form>
    </div>
@stop
