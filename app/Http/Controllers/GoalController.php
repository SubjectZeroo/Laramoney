<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGoalRequest;
use App\Http\Requests\UpdateGoalRequest;
use App\Models\Account;
use App\Models\Goal;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class GoalController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:goals.create')->only('create', 'store');
        $this->middleware('can:goals.edit')->only('edit', 'update');
        $this->middleware('can:goals.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (session('success_message')) {
            Alert::toast(session('success_message'), 'success');
        }

        if ($request->ajax()) {

            $data = Goal::join("users", "users.id", "=", "goals.user_id")
                ->join("accounts", "accounts.id", "=", "goals.account_id")
                ->select(
                    "goals.id",
                    "goals.name",
                    "goals.balance",
                    "goals.amount",
                    "goals.deposit",
                    "accounts.name AS account_name",
                    "users.name AS user_name"
                );

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('Actions', 'goal/datatables/actions')
                ->addColumn('goal', function (Goal $goal) {
                    $target   = $goal->amount;
                    $deposit   = $goal->deposit;
                    $balance   = $goal->balance;
                    $totaldeposit  = $deposit + $balance;
                    $remaining   = $target - ($deposit + $balance);
                    $percentage  = ($totaldeposit / $target) * 100;

                    return '
                    <div class="progress" style="height:6px;">
                    	<div class="progress-bar progress-bar-success " role="progressbar"
                    	aria-valuenow="' . $percentage . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $percentage . '%">

                    	</div>
                    </div>
                    <div class="pull-left text-primary text-bold"><small>' . '$' . number_format($totaldeposit, 2) . ' (' . number_format($percentage, 2) . '%)</small></div><div class="pull-right"><small>' . '$' . number_format($remaining, 2) . '</small></div>';
                })
                ->rawColumns(['goal', 'Actions'])
                ->make(true);
        }

        return view('goal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Account::all();
        return view('goal.create', compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGoalRequest $request)
    {

        $goal = auth()->user()->goals()->create($request->validated());

        return redirect()->route('goals.index')->withSuccessMessage('Goal Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Goal $goal)
    {
        $accounts = Account::all();
        return view('goal.edit', compact('goal', 'accounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGoalRequest $request, Goal $goal)
    {
        $goal->update($request->validated());
        return redirect()->route('goals.index')->withSuccessMessage('Goal Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $goal = new Goal();
        $goal->deleteData($id);
        return response()->json(['success' => 'Goal Deleted']);
    }
}
