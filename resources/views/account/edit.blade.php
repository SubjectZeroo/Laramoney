@extends('adminlte::page')

@section('title', 'Update Account')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="m-0 text-dark">
                Update Account
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Update Account</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <form method="POST" action="{{ route('accounts.update', $account->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Name</label>
                        <input type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                            name="name" placeholder="Name" value="{{ old('name', $account->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="amount">Balance</label>
                        <input type="text" class="form-control  {{ $errors->has('balance') ? 'is-invalid' : '' }}"
                            id="balance" name="balance" placeholder="Balance"
                            value="{{ old('name', $account->balance) }}">
                        @error('balance')
                            <div class="invalid-feedback">
                                {{ $errors->first('balance') }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="reference">Account Number</label>
                        <input type="text" class="form-control {{ $errors->has('account_number') ? 'is-invalid' : '' }}"
                            id="account_number" name="account_number" placeholder="Account Number"
                            value="{{ old('name', $account->account_number) }}">
                        @error('account_number')
                            <div class="invalid-feedback">
                                {{ $errors->first('account_number') }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description"
                            placeholder="Description">{{ $account->description }}</textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save Account</button>
            </div>
        </form>
    </div>
@stop
