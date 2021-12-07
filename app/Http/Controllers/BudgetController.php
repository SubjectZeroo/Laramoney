<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBudgetRequest;
use App\Http\Requests\UpdateBudgetRequest;
use App\Models\Budget;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class BudgetController extends Controller
{
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

            $data = Budget::join("users", "users.id", "=", "budgets.user_id")
                ->join("categories", "categories.id", "=", "budgets.category_id")
                ->select(
                    "budgets.id",
                    "budgets.amount",
                    "users.name AS user_name",
                    "categories.name AS category_name",
                );

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('Actions', 'budget/datatables/actions')
                ->rawColumns(['Actions'])
                ->make(true);
        }
        return view('budget.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('budget.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBudgetRequest $request)
    {
        $budget = auth()->user()->budgets()->create($request->validated());

        return redirect()->route('budgets.index')->withSuccessMessage('Budget Created');
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
    public function edit(Budget $budget)
    {
        $categories = Category::all();
        return view('budget.edit', compact('budget', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBudgetRequest $request, Budget $budget)
    {
        $budget->update($request->validated());
        return redirect()->route('budgets.index')->withSuccessMessage('Budget Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $budget = new Budget();
        $budget->deleteData($id);
        return response()->json(['success' => 'Budget Deleted']);
    }
}
