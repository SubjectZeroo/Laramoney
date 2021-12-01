@extends('adminlte::page')

@section('title', 'New Goal')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="m-0 text-dark">
                New Goal
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}"> Dashboard</a>
                </li>
                <li class="breadcrumb-item active">New Goal</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <form method="POST" action="{{ route('goals.store') }}">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="amount">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="amount">Opening Balance</label>
                        <input type="text" class="form-control" id="balance" name="balance" placeholder="Opening Balance">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="amount">Target</label>
                        <input type="text" class="form-control" id="balance" name="balance" placeholder="Target">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Target Date</label>
                        <input type="date" class="form-control" id="deadline" name="deadline">
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save Goal</button>
            </div>
        </form>
    </div>
@stop
