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
        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="amount">Category Name</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                            name="name" placeholder="Category Name" value="{{ old('name', $category->name) }}">
                        @error('name')
                            <div class=" invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="   form-row">
                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description"
                            id="description">{{ $category->description }}</textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Goal</button>
            </div>
        </form>
    </div>
@stop
