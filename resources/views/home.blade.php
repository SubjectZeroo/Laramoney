<x-layout>
    @section('title', 'Dashboard')

    @section('content_header')
        <h1>Dashboard</h1>
    @stop

    @section('content')
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>Income</h3>
                        <p>${{ $totalMonthIncome }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-arrow-up"></i>
                    </div>
                    <a class="small-box-footer">
                        <i class="fas fa-sync-alt"></i>
                        This Month ({{ date('F') }})
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">

                        <h3>Expense</h3>
                        <p>${{ $totalMonthExpense }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-arrow-down"></i>
                    </div>
                    <a class="small-box-footer">
                        <i class="fas fa-sync-alt"></i>
                        This Month ({{ date('F') }})
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>Income</h3>
                        <p>${{ $totalDayIncome }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-arrow-up"></i>
                    </div>
                    <a class="small-box-footer">
                        <i class="fas fa-sync-alt"></i>
                        Today ({{ date('d M Y') }})
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>Expense</h3>
                        <p>${{ $totalDayExpense }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-arrow-down"></i>
                    </div>
                    <a class="small-box-footer">
                        <i class="fas fa-sync-alt"></i>
                        Today ({{ date('d M Y') }})
                    </a>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <p class="lead">Income VS Expense {{ date('Y') }}</p>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Monitoring Income and Expense this Year</p>
                        <!-- Chart's container -->
                        <div id="income_vs_expense" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <p class="lead">Account Balance {{ date('Y') }}</p>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Monitoring Account Balances this Year</p>
                        <!-- Chart's container -->
                        <div id="account_balance_chart" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <p class="lead">Expense By Category {{ date('F Y') }}</p>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Monitoring Expense this month</p>
                        <!-- Chart's container -->
                        <div id="expense_by_category_chart" style="height: 300px"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <p class="lead">Income By Category {{ date('F Y') }}</p>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Monitoring Income this month</p>
                        <!-- Chart's container -->
                        <div id="income_by_category_chart" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <p class="lead">Budget {{ date('F Y') }}</p>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Monitoring Budget this month</p>
                        <!-- Chart's container -->
                        <div id="budget_by_month_chart" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Latest Income
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Monitoring latest Income this month</p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Account</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lastTransactionIncomes as $lastTransactionIncome)
                                    <tr>
                                        <td>{{ $lastTransactionIncome->name }}</td>
                                        <td>{{ $lastTransactionIncome->account->name }}</td>
                                        <td>{{ $lastTransactionIncome->amount }}</td>
                                        <td>{{ $lastTransactionIncome->transaction_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Latest Expense
                    </div>
                    <div class="card-body">
                        <p>Monitoring latest Expense this month</p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Account</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lastTransactionExpenses as $lastTransactionExpense)
                                    <tr>
                                        <td>{{ $lastTransactionExpense->name }}</td>
                                        <td>{{ $lastTransactionExpense->account->name }}</td>
                                        <td>{{ $lastTransactionExpense->amount }}</td>
                                        <td>{{ $lastTransactionExpense->transaction_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @stop
    @section('js')
        <!-- Charting library -->
        <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
        <!-- Chartisan -->
        <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
        <!-- Your application script -->
        <script>
            const incomeVsExpense = new Chartisan({
                el: '#income_vs_expense',
                url: "@chart('income_vs_expense_chart')",
                hooks: new ChartisanHooks()
                    .legend()
                    .colors()
                    .datasets(['line', 'line'])
                    .tooltip(),
            });
            const accountBalance = new Chartisan({
                el: '#account_balance_chart',
                url: "@chart('account_balance_chart')",
                hooks: new ChartisanHooks()
                    .legend()
                    .colors()
                    .datasets(['bar'])
                    .tooltip(),
            });
            const expenseByCategory = new Chartisan({
                el: '#expense_by_category_chart',
                url: "@chart('expense_by_category_chart')",
                hooks: new ChartisanHooks()
                    .datasets('pie')
                    .axis(false)
                    .legend()
                    .tooltip(),


            });
            const incomeByCategory = new Chartisan({
                el: '#income_by_category_chart',
                url: "@chart('income_by_category_chart')",
                hooks: new ChartisanHooks()
                    .datasets('pie')
                    .axis(false)
                    .legend()
                    .tooltip(),

            });

            const budgetByMonth = new Chartisan({
                el: '#budget_by_month_chart',
                url: "@chart('budget_by_month_chart')",
                hooks: new ChartisanHooks()
                    .datasets('pie')
                    .axis(false)
                    .legend()
                    .tooltip(),
            });

        </script>
    @stop
</x-layout>
