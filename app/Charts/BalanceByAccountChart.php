<?php

declare(strict_transaction_category_ids=1);

namespace App\Charts;

use App\Models\Account;
use App\Models\Transaction;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BalanceByAccountChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {



        $year = date('Y');
        config()->set('database.connections.mysql.strict', false);


        $ijan  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
            ->where('transaction_category_id', '=', '1')
            ->where('accounts.id', '=' , $request->id)
            ->whereMonth('transaction_date', '=', '01')
            ->whereYear('transaction_date', '=', $year)
            ->sum('amount');

        $ifeb  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
            ->where('transaction_category_id', '=', '1')
            ->where('accounts.id','=', $request->id)
            ->whereMonth('transaction_date', '=', '02')
            ->whereYear('transaction_date', '=', $year)
            ->sum('amount');

        $imar  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
            ->where('transaction_category_id', '=', '1')
            ->where('accounts.id','=', $request->id)
            ->whereMonth('transaction_date', '=', '03')
            ->whereYear('transaction_date', '=', $year)
            ->sum('amount');

        $iapr  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
            ->where('transaction_category_id', '=', '1')
            ->where('accounts.id','=', $request->id)
            ->whereMonth('transaction_date', '=', '04')
            ->whereYear('transaction_date', '=', $year)
            ->sum('amount');

        $imay  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
            ->where('transaction_category_id', '=', '1')
            ->where('accounts.id','=', $request->id)
            ->whereMonth('transaction_date', '=', '05')
            ->whereYear('transaction_date', '=', $year)
            ->sum('amount');

        $ijun  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
            ->where('transaction_category_id', '=', '1')
            ->where('accounts.id','=', $request->id)
            ->whereMonth('transaction_date', '=', '06')
            ->whereYear('transaction_date', '=', $year)
            ->sum('amount');

        $ijul  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
            ->where('transaction_category_id', '=', '1')
            ->where('accounts.id','=', $request->id)
            ->whereMonth('transaction_date', '=', '07')
            ->whereYear('transaction_date', '=', $year)
            ->sum('amount');

        $iags  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
            ->where('transaction_category_id', '=', '1')
            ->where('accounts.id','=', $request->id)
            ->whereMonth('transaction_date', '=', '08')
            ->whereYear('transaction_date', '=', $year)
            ->sum('amount');

        $isep  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
            ->where('transaction_category_id', '=', '1')
            ->where('accounts.id','=', $request->id)
            ->whereMonth('transaction_date', '=', '09')
            ->whereYear('transaction_date', '=', $year)
            ->sum('amount');

        $ioct  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
            ->where('transaction_category_id', '=', '1')
            ->where('accounts.id','=', $request->id)
            ->whereMonth('transaction_date', '=', '10')
            ->whereYear('transaction_date', '=', $year)
            ->sum('amount');

        $inov  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
            ->where('transaction_category_id', '=', '1')
            ->where('accounts.id','=', $request->id)
            ->whereMonth('transaction_date', '=', '11')
            ->whereYear('transaction_date', '=', $year)
            ->sum('amount');

        $idec  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
            ->where('transaction_category_id', '=', '1')
            ->where('accounts.id','=', $request->id)
            ->whereMonth('transaction_date', '=', '12')
            ->whereYear('transaction_date', '=', $year)
            ->sum('amount');

    /**
    * expense
    */
    $ejan  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
        ->where('transaction_category_id', '=', '2')
        ->where('accounts.id', '=' , $request->id)
        ->whereMonth('transaction_date', '=', '01')
        ->whereYear('transaction_date', '=', $year)
        ->sum('amount');

    $efeb  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
        ->where('transaction_category_id', '=', '2')
        ->where('accounts.id','=', $request->id)
        ->whereMonth('transaction_date', '=', '02')
        ->whereYear('transaction_date', '=', $year)
        ->sum('amount');

    $emar  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
        ->where('transaction_category_id', '=', '2')
        ->where('accounts.id','=', $request->id)
        ->whereMonth('transaction_date', '=', '03')
        ->whereYear('transaction_date', '=', $year)
        ->sum('amount');

    $eapr  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
        ->where('transaction_category_id', '=', '2')
        ->where('accounts.id','=', $request->id)
        ->whereMonth('transaction_date', '=', '04')
        ->whereYear('transaction_date', '=', $year)
        ->sum('amount');

    $emay  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
        ->where('transaction_category_id', '=', '2')
        ->where('accounts.id','=', $request->id)
        ->whereMonth('transaction_date', '=', '05')
        ->whereYear('transaction_date', '=', $year)
        ->sum('amount');

    $ejun  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
        ->where('transaction_category_id', '=', '2')
        ->where('accounts.id','=', $request->id)
        ->whereMonth('transaction_date', '=', '06')
        ->whereYear('transaction_date', '=', $year)
        ->sum('amount');

    $ejul  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
        ->where('transaction_category_id', '=', '2')
        ->where('accounts.id','=', $request->id)
        ->whereMonth('transaction_date', '=', '07')
        ->whereYear('transaction_date', '=', $year)
        ->sum('amount');

    $eags  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
        ->where('transaction_category_id', '=', '2')
        ->where('accounts.id','=', $request->id)
        ->whereMonth('transaction_date', '=', '08')
        ->whereYear('transaction_date', '=', $year)
        ->sum('amount');

    $esep  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
        ->where('transaction_category_id', '=', '2')
        ->where('accounts.id','=', $request->id)
        ->whereMonth('transaction_date', '=', '09')
        ->whereYear('transaction_date', '=', $year)
        ->sum('amount');

    $eoct  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
        ->where('transaction_category_id', '=', '2')
        ->where('accounts.id','=', $request->id)
        ->whereMonth('transaction_date', '=', '10')
        ->whereYear('transaction_date', '=', $year)
        ->sum('amount');

    $enov  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
        ->where('transaction_category_id', '=', '2')
        ->where('accounts.id','=', $request->id)
        ->whereMonth('transaction_date', '=', '11')
        ->whereYear('transaction_date', '=', $year)
        ->sum('amount');

    $edec  = Transaction::join('accounts', 'accounts.id', '=', 'transactions.account_id')
        ->where('transaction_category_id', '=', '2')
        ->where('accounts.id','=', $request->id)
        ->whereMonth('transaction_date', '=', '12')
        ->whereYear('transaction_date', '=', $year)
        ->sum('amount');



        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        return Chartisan::build()
            ->labels($labels)
            ->dataset('Income', [$ijan, $ifeb, $imar, $iapr, $imay, $ijun, $ijul, $iags,  $isep, $ioct, $inov, $idec])
            ->dataset('Expense', [$ejan, $efeb, $emar, $eapr, $emay, $ejun, $ejul, $eags,  $esep, $eoct, $enov, $edec]);
    }
}
