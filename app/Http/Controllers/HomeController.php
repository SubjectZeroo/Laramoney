<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    // select(DB::raw('sum(amount) as totalYear'))
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $totalBalanceIncome = Transaction::where('transaction_category_id', '=', '1')
        //     ->sum('amount');

        // $totalYearIncome = Transaction::where('transaction_category_id', '=', '1')
        //     ->whereYear('transaction_date', date('Y'))
        //     ->sum('amount');

        $totalMonthIncome = Transaction::where('transaction_category_id', '=', '1')
            ->whereMonth('transaction_date', date('m'))
            ->sum('amount');

        $totalMonthExpense = Transaction::where('transaction_category_id', '=', '2')
            ->whereMonth('transaction_date', date('m'))
            ->sum('amount');

        // $totalWeekIncome = Transaction::where('transaction_category_id', '=', '1')
        //     ->whereRaw('YEARWEEK(curdate()) = YEARWEEK(transaction_date)')
        //     ->sum('amount');

        $totalDayIncome = Transaction::where('transaction_category_id', '=', '1')
            ->whereDate('transaction_date', date('Y-m-d'))
            ->sum('amount');

        $totalDayExpense = Transaction::where('transaction_category_id', '=', '2')
            ->whereDate('transaction_date', date('Y-m-d'))
            ->sum('amount');

        $data = [
            'totalMonthIncome' => $totalMonthIncome,
            'totalMonthExpense' => $totalMonthExpense,
            'totalDayIncome' => $totalDayIncome,
            'totalDayExpense' => $totalDayExpense
        ];


        return view('home')->with($data);
    }
}
