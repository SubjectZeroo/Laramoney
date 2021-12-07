<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        $charts->register([
            \App\Charts\IncomeVsExpenseChart::class,
            \App\Charts\AccountBalanceChart::class,
            \App\Charts\ExpenseByCategoryChart::class,
            \App\Charts\IncomeByCategoryChart::class,
            \App\Charts\BudgetByMonthChart::class,
        ]);
    }
}
