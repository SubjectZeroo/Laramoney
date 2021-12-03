@extends('adminlte::page')

@section('title', 'Update Budget')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="m-0 text-dark">
                Update Budget
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}"> Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Update Budget</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <form method="POST" action="{{ route('budgets.update', $budget->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}"
                            id="amount" name="amount" placeholder="Amount" value="{{ old('amount', $budget->amount) }}">
                        @error('amount')
                            <div class=" invalid-feedback">
                                {{ $errors->first('amount') }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="category_id">Categories</label>
                        <select id="category_id" name="category_id"
                            class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                            <option selected>Choose...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id === $budget->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class=" invalid-feedback">
                                {{ $errors->first('category_id') }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="from_date">From Date</label>
                        <input type="text" class="form-control {{ $errors->has('from_date') ? 'is-invalid' : '' }}"
                            id="from_date" name="from_date" value="{{ old('from_date', $budget->from_date) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="to_date">To Date</label>
                        <input type="text" class="form-control {{ $errors->has('to_date') ? 'is-invalid' : '' }}"
                            id="to_date" name="to_date" value="{{ old('to_date', $budget->to_date) }}">
                        @error('to_date')
                            <div class=" invalid-feedback">
                                {{ $errors->first('to_date') }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Description"
                            value="{{ old('description') }}">{{ $budget->description }}</textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Budget</button>
            </div>
        </form>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@stop
