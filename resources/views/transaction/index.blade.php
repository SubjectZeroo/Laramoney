<x-layout>
    @section('title', 'Transactions')

    @section('content_header')
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="m-0 text-dark">
                    Transactions
                </h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}"> Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Transactions</li>
                </ol>
            </div>
            <a class="btn btn-primary btn-lg text-white" href="{{ route('transactions.create') }}">
                <i class="fas fa-plus mr-1"></i>
                Save Transaction
            </a>
        </div>
    @stop
    @section('content')
        <div class="card">
            <div class="card-body">
                @include('transaction.datatables.table')
            </div>
        </div>
    @stop
</x-layout>
