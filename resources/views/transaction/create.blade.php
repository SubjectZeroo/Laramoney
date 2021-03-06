@extends('adminlte::page')

@section('title', 'New Transaction')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="m-0 text-dark">
                New Transaction
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}"> Dashboard</a>
                </li>
                <li class="breadcrumb-item active"> New Transaction</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <form method="POST" action="{{ route('transactions.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Name</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                            name="name" placeholder="Name" value="{{ old('name') }}">
                        @error('name')
                            <div class=" invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="validationDefaultUsername">Amount</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="amount">$</span>
                            </div>
                            <input type="text" class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}"
                                id="amount" name="amount" placeholder="Amount" aria-describedby="inputGroupPrepend2"
                                value="{{ old('amount') }}">
                        </div>
                        @error('amount')
                            <div class=" invalid-feedback">
                                {{ $errors->first('amount') }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="reference">Reference</label>
                        <input type="text" class="form-control {{ $errors->has('reference') ? 'is-invalid' : '' }}"
                            id="reference" name="reference" placeholder="Reference" value="{{ old('reference') }}">
                        @error('reference')
                            <div class=" invalid-feedback">
                                {{ $errors->first('reference') }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="account_id">Acount</label>
                        <select id="account_id" name="account_id"
                            class="form-control {{ $errors->has('account_id') ? 'is-invalid' : '' }}">
                            <option selected>Choose...</option>
                            @foreach ($accounts as $account)
                                <option value="{{ $account->id }}"
                                    {{ old('account_id') == $account->id ? 'selected' : '' }}>
                                    {{ $account->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('account_id')
                            <div class=" invalid-feedback">
                                {{ $errors->first('account_id') }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="transaction_category_id">Type Transaction</label>
                        <select id="transaction_category_id" name="transaction_category_id"
                            class="form-control {{ $errors->has('transaction_category_id') ? 'is-invalid' : '' }}">
                            <option selected>Choose...</option>
                            @foreach ($transactionCategories as $transactionCategory)
                                <option value="{{ $transactionCategory->id }}"
                                    {{ old('transaction_category_id') == $transactionCategory->id ? 'selected' : '' }}>
                                    {{ $transactionCategory->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('transaction_category_id')
                            <div class=" invalid-feedback">
                                {{ $errors->first('transaction_category_id') }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="category_id">Categories</label>
                        <select id="category_id" name="category_id"
                            class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                            <option selected>Choose...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                    <div class=" form-group col-md-4">
                        <label for="date">Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-calendar-week"></i>
                                </span>
                            </div>
                            <input type="text"
                                class="form-control {{ $errors->has('transaction_date') ? 'is-invalid' : '' }}"
                                name="transaction_date" id="transaction_date" value="{{ old('transaction_date') }}">
                            @error('transaction_date')
                                <div class=" invalid-feedback">
                                    {{ $errors->first('transaction_date') }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Description"
                            value="{{ old('description') }}"></textarea>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save Transaction</button>
            </div>
        </form>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
    @include('sweetalert::alert')
@stop
