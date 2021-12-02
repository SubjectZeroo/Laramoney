@extends('adminlte::page')

@section('title', 'New Goal')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="m-0 text-dark">
                Update Category
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Update Category</li>
            </ol>
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <form method="POST" action="{{ route('category.store') }}">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="amount">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
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
                <button type="submit" class="btn btn-primary">Save Goal</button>
            </div>
        </form>
    </div>
@stop
