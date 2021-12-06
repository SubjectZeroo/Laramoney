<?php

declare(strict_types=1);

namespace App\Charts;

use App\Models\Transaction;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountBalanceChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {

        config()->set('database.connections.mysql.strict', false);

        $balanceIncomeAccounts =  DB::table('transactions')
            ->join('accounts', 'accounts.id', '=', 'transactions.account_id')
            ->select('accounts.name as account_name', DB::raw('sum(transactions.amount) as sum'))
            ->where('transactions.transaction_category_id', '=', '1')
            ->groupBy('accounts.name')
            ->get();

        // $balanceExpenseAccounts =  DB::table('transactions')
        //     ->join('accounts', 'accounts.id', '=', 'transactions.account_id')
        //     ->select('accounts.name as account_name', DB::raw('sum(transactions.amount) as sum'))
        //     ->where('transactions.transaction_category_id', '=', '2')
        //     ->groupBy('accounts.name')
        //     ->get();

        $labels = [];
        $count = [];

        foreach ($balanceIncomeAccounts as $balanceIncomeAccount) {
            array_push($labels, $balanceIncomeAccount->account_name);
            array_push($count,  $balanceIncomeAccount->sum);
        }

        // foreach ($balanceExpenseAccounts as $balanceExpenseAccount) {
        //     array_push($labels, $balanceExpenseAccount->account_name);
        //     array_push($count,  $balanceExpenseAccount->sum);
        // }

        return Chartisan::build()
            ->labels($labels)
            ->dataset('Account', $count);
    }
}
