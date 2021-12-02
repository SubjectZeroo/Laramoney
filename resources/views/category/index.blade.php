@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="m-0 text-dark">
                Category List
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}"> Dashboard</a>
                </li>
                <li class="breadcrumb-item active"> Category List</li>
            </ol>
        </div>
        <a class="btn btn-primary btn-lg text-white" href="{{ route('categories.create') }}">
            <i class="fas fa-plus mr-1"></i>
            Add Category
        </a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('category.datatables.table')
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
    @include('sweetalert::alert')
@stop
