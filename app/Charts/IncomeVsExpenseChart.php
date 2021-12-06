<?php

declare(strict_types=1);

namespace App\Charts;

use App\Models\Transaction;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class IncomeVsExpenseChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        // $dataMachineLinkeds = Machine::join("machine_models", "machine_models.id", "=", "machines.machine_model_id")
        //                             ->join("machine_categories", "machine_categories.id","=", "machine_models.machine_category_id")
        //                             ->join("guides", "guides.machine_id","=", "machines.id")
        //                             ->select('machine_categories.name AS machine_category_name',
        //                                 DB::raw('count(guides.guide_category_id) AS total'))
        //                             ->where("guide_category_id", 1)
        //                             ->groupBy("machine_models.machine_category_id")
        //                             ->get();

        // $labels =[];
        // $count = [];

        // foreach ($dataMachineLinkeds as $dataMachineLinked){
        //     array_push($labels, $dataMachineLinked->machine_category_name);
        //     array_push($count,  $dataMachineLinked->total);
        // }

        // return Chartisan::build()
        // ->labels($labels)
        // ->dataset('Categoria Maquinaria', $count);

        $thisYear = date("Y");

        /**Income */

        $ijan  = Transaction::where('transaction_category_id', '=', '1')
            ->whereMonth('transaction_date', '=', '01')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $ifeb  = Transaction::where('transaction_category_id', '=', '1')
            ->whereMonth('transaction_date', '=', '02')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $imar  = Transaction::where('transaction_category_id', '=', '1')
            ->whereMonth('transaction_date', '=', '03')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $iapr  = Transaction::where('transaction_category_id', '=', '1')
            ->whereMonth('transaction_date', '=', '04')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $imay  = Transaction::where('transaction_category_id', '=', '1')
            ->whereMonth('transaction_date', '=', '05')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $ijun  = Transaction::where('transaction_category_id', '=', '1')
            ->whereMonth('transaction_date', '=', '06')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');
        $ijul  = Transaction::where('transaction_category_id', '=', '1')
            ->whereMonth('transaction_date', '=', '07')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $iags  = Transaction::where('transaction_category_id', '=', '1')
            ->whereMonth('transaction_date', '=', '08')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $isep  = Transaction::where('transaction_category_id', '=', '1')
            ->whereMonth('transaction_date', '=', '09')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');
        $ioct  = Transaction::where('transaction_category_id', '=', '1')
            ->whereMonth('transaction_date', '=', '10')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $inov  = Transaction::where('transaction_category_id', '=', '1')
            ->whereMonth('transaction_date', '=', '11')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');
        $idec  = Transaction::where('transaction_category_id', '=', '1')
            ->whereMonth('transaction_date', '=', '12')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        /**Upcoming Income */

        $uijan  = Transaction::where('transaction_category_id', '=', '3')
            ->whereMonth('transaction_date', '=', '01')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $uifeb  = Transaction::where('transaction_category_id', '=', '3')
            ->whereMonth('transaction_date', '=', '02')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $uimar  = Transaction::where('transaction_category_id', '=', '3')
            ->whereMonth('transaction_date', '=', '03')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $uiapr  = Transaction::where('transaction_category_id', '=', '3')
            ->whereMonth('transaction_date', '=', '04')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $uimay  = Transaction::where('transaction_category_id', '=', '3')
            ->whereMonth('transaction_date', '=', '05')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $uijun  = Transaction::where('transaction_category_id', '=', '3')
            ->whereMonth('transaction_date', '=', '06')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');
        $uijul  = Transaction::where('transaction_category_id', '=', '3')
            ->whereMonth('transaction_date', '=', '07')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $uiags  = Transaction::where('transaction_category_id', '=', '3')
            ->whereMonth('transaction_date', '=', '08')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $uisep  = Transaction::where('transaction_category_id', '=', '3')
            ->whereMonth('transaction_date', '=', '09')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');
        $uioct  = Transaction::where('transaction_category_id', '=', '3')
            ->whereMonth('transaction_date', '=', '10')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $uinov  = Transaction::where('transaction_category_id', '=', '3')
            ->whereMonth('transaction_date', '=', '11')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');
        $uidec  = Transaction::where('transaction_category_id', '=', '3')
            ->whereMonth('transaction_date', '=', '12')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        /**Expense */

        $ejan  = Transaction::where('transaction_category_id', '=', '2')
            ->whereMonth('transaction_date', '=', '01')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $efeb  = Transaction::where('transaction_category_id', '=', '2')
            ->whereMonth('transaction_date', '=', '02')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $emar  = Transaction::where('transaction_category_id', '=', '2')
            ->whereMonth('transaction_date', '=', '03')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $eapr  = Transaction::where('transaction_category_id', '=', '2')
            ->whereMonth('transaction_date', '=', '04')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $emay  = Transaction::where('transaction_category_id', '=', '2')
            ->whereMonth('transaction_date', '=', '05')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $ejun  = Transaction::where('transaction_category_id', '=', '2')
            ->whereMonth('transaction_date', '=', '06')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');
        $ejul  = Transaction::where('transaction_category_id', '=', '2')
            ->whereMonth('transaction_date', '=', '07')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $eags  = Transaction::where('transaction_category_id', '=', '2')
            ->whereMonth('transaction_date', '=', '08')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $esep  = Transaction::where('transaction_category_id', '=', '2')
            ->whereMonth('transaction_date', '=', '09')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');
        $eoct  = Transaction::where('transaction_category_id', '=', '2')
            ->whereMonth('transaction_date', '=', '10')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $enov  = Transaction::where('transaction_category_id', '=', '2')
            ->whereMonth('transaction_date', '=', '11')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');
        $edec  = Transaction::where('transaction_category_id', '=', '2')
            ->whereMonth('transaction_date', '=', '12')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        /**Upcoming Expense */

        $uejan  = Transaction::where('transaction_category_id', '=', '4')
            ->whereMonth('transaction_date', '=', '01')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $uefeb  = Transaction::where('transaction_category_id', '=', '4')
            ->whereMonth('transaction_date', '=', '02')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $uemar  = Transaction::where('transaction_category_id', '=', '4')
            ->whereMonth('transaction_date', '=', '03')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $ueapr  = Transaction::where('transaction_category_id', '=', '4')
            ->whereMonth('transaction_date', '=', '04')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $uemay  = Transaction::where('transaction_category_id', '=', '4')
            ->whereMonth('transaction_date', '=', '05')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $uejun  = Transaction::where('transaction_category_id', '=', '4')
            ->whereMonth('transaction_date', '=', '06')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');
        $uejul  = Transaction::where('transaction_category_id', '=', '4')
            ->whereMonth('transaction_date', '=', '07')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $ueags  = Transaction::where('transaction_category_id', '=', '4')
            ->whereMonth('transaction_date', '=', '08')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $uesep  = Transaction::where('transaction_category_id', '=', '4')
            ->whereMonth('transaction_date', '=', '09')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');
        $ueoct  = Transaction::where('transaction_category_id', '=', '4')
            ->whereMonth('transaction_date', '=', '10')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $uenov  = Transaction::where('transaction_category_id', '=', '4')
            ->whereMonth('transaction_date', '=', '11')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');
        $uedec  = Transaction::where('transaction_category_id', '=', '4')
            ->whereMonth('transaction_date', '=', '12')
            ->whereYear('transaction_date', '=', $thisYear)
            ->sum('amount');

        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        return Chartisan::build()
            ->labels($labels)
            ->dataset('Income', [$ijan, $ifeb, $imar, $iapr, $imay, $ijun, $ijul, $iags,  $isep, $ioct, $inov, $idec])
            ->dataset('Expense', [$ejan, $efeb, $emar, $eapr, $emay, $ejun, $ejul, $eags, $esep, $eoct, $enov, $edec]);
    }
}
