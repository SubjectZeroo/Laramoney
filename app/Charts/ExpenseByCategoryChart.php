<?php

declare(strict_types=1);

namespace App\Charts;

use App\Models\Transaction;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseByCategoryChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {

        $expenseByCategories = Transaction::join('categories', 'categories.id', '=', 'transactions.category_id')
            ->join('users', 'users.id', '=', 'transactions.user_id')
            ->select(DB::raw('sum(amount) as amount, categories.name as category'))
            ->where('transactions.transaction_category_id', '2')
            ->whereMonth('transaction_date', '=', date("m"))
            ->groupBy('categories.id')
            ->groupBy('categories.name')
            ->get();

        $labels = [];
        $amount = [];
        foreach ($expenseByCategories as $expenseByCategory) {
            array_push($labels, $expenseByCategory->category);
            array_push($amount,  $expenseByCategory->amount);
        }
        return Chartisan::build()
            ->labels($labels)
            ->dataset('Categories', $amount);
    }
}
