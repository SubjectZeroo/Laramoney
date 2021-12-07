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
        $balanceAccounts = DB::select("SELECT p.name,COALESCE(a.amount,0) as income,COALESCE(b.amount,0) as expense, COALESCE(p.balance+(COALESCE(a.amount,0)-COALESCE(b.amount,0)),0) as balance from accounts as p left join (select account_id,sum(amount) as amount from transactions where transaction_category_id=1 and year(transaction_date)=" . date('Y') . " group by account_id) as a on a.account_id = p.id left join (select account_id,sum(amount) as amount from transactions where transaction_category_id=2 and year(transaction_date)=" . date('Y') . " group by account_id) as b on b.account_id = p.id group by p.id");


        $labels = [];
        $expense = [];
        $income = [];
        foreach ($balanceAccounts as $balanceAccount) {
            array_push($labels, $balanceAccount->name);
            array_push($income,  $balanceAccount->income);
            array_push($expense,  $balanceAccount->expense);
        }

        return Chartisan::build()
            ->labels($labels)
            ->dataset('Income', $income)
            ->dataset('Expense', $expense);
    }
}
