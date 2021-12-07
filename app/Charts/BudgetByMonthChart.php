<?php

declare(strict_types=1);

namespace App\Charts;

use App\Models\Budget;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class BudgetByMonthChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        // $data = DB::table('budget')
        //     ->join('subcategory', 'subcategory.subcategoryid', '=', 'budget.categoryid')
        //     ->join('category', 'subcategory.categoryid', '=', 'category.categoryid')
        //     ->whereMonth('budget.fromdate', '=', date("m"))
        //     ->groupBy('budget.categoryid')
        //     ->get();
        config()->set('database.connections.mysql.strict', false);
        $budgetLists = Budget::join('categories', 'categories.id', '=', 'budgets.category_id')
            ->whereMonth('budgets.from_date', '=', date("m"))
            ->groupBy('budgets.category_id')
            ->get();


        $labels = [];
        $amount = [];
        foreach ($budgetLists as $budgetList) {
            array_push($labels, $budgetList->name);
            array_push($amount,  $budgetList->amount);
        }
        return Chartisan::build()
            ->labels($labels)
            ->dataset('Categories', $amount);
    }
}
