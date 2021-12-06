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
                        <h2 class="lead">Income VS Expense 2021</h2>
                    </div>
                    <div class="card-body">
                        <!-- Chart's container -->
                        <div id="income_vs_expense" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="lead">Account Balance 2021</h2>
                    </div>
                    <div class="card-body">
                        <!-- Chart's container -->
                        <div id="account_balance_chart" style="height: 300px;"></div>
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
        </script>
    @stop
</x-layout>
