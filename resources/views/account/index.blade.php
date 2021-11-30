@extends('adminlte::page')

@section('title', 'Accounts')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="m-0 text-dark">
                Accounts
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}"> Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Accounts</li>
            </ol>
        </div>
        <a class="btn btn-primary btn-lg text-white" href="{{ route('accounts.create') }}">
            <i class="fas fa-plus mr-1"></i>
            Add New Account
        </a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

        </div>
    </div>

@stop
