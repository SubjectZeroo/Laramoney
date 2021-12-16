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
                            <small>
                                <b>Account Balance</b>
                            </small>
                            <h4>
                                <span class="text-success">$</span>
                                <span class="text-success">{{ $account->balance }}</span>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div id="balance_by_account_chart" style="height: 200px;"></div>
                    </div>
                </div>
            </div>
        </div>
    @stop
    @section('content')

        <div class="card">
            <div class="card-header">

                Account Transaction Reports

            </div>
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
                    <tbody>
                        @foreach ($account->transactions as $transaction)
                            <tr>
                                <td>
                                    {{ $transaction->transaction_date }}
                                </td>
                                <td>
                                    {{ $transaction->name }}
                                </td>
                                <td>
                                    {{ $transaction->transactionCategory->name }}
                                </td>
                                <td>
                                    {{ $transaction->reference }}
                                </td>
                                <td>
                                    {{ $transaction->amount }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @stop
    @push('js')
        <!-- Charting library -->
        <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
        <!-- Chartisan -->
        <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
        <!-- Your application script -->
        <script>

            let id =  "{{$account->id}}";

            const balanceByAccount = new Chartisan({
                el: '#balance_by_account_chart',
                url: "@chart('balance_by_account_chart')" + "?id=" + id,
                hooks: new ChartisanHooks()
                    .legend()
                    .colors()
                    .datasets(['line','line'])
                    .tooltip(),
            });
        </script>
    @endpush
</x-layout>

