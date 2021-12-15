<x-layout>
    @section('title', 'New Account')
    @section('content_header')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="title">{{ $account->name }}</h4>
                        <h5>{{ $account->account_number }}</h5>
                    </div>
                    <div class="col-lg-6">
                        <div class="float-right">
                            <a href="#'" data-toggle="modal" data-target="#delete" class="btn btn-sm btn-fill btn-danger">
                                <i class="far fa-trash-alt"></i>
                                Delete Account
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row py-5">
                    <div class="col-lg-4">
                        <h4>
                            <span class="text-success">$</span>
                            <span class="text-success">{{ $account->balance }}</span>
                        </h4>
                        <small>
                            <b>Account Balance</b>
                        </small>
                    </div>
                    <div class="col-lg-8">
                    </div>
                </div>
            </div>
        </div>
    @stop
    @section('content')

        <div class="card">
            <div class="card-body">
                <table id="table-transaction-by-account" class="table table-striped table-bordered display nowrap"
                    width="100%">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Reference</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
    @stop
</x-layout>
