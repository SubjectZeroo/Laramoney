<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Account;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Transaction;
use App\Models\TransactionCategory;
use Illuminate\Http\Request;
use \App\Tables\TransactionsTable;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:transactions.create')->only('create', 'store');
        $this->middleware('can:transactions.edit')->only('edit', 'update');
        $this->middleware('can:transactions.destroy')->only('destroy');
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

            $data = Transaction::join("users", "users.id", "=", "transactions.user_id")
                ->join("categories", "categories.id", "=", "transactions.category_id")
                ->join("accounts", "accounts.id", "=", "transactions.account_id")
                ->join("transaction_categories", "transaction_categories.id", "=", "transactions.transaction_category_id")
                ->select(
                    "transactions.id",
                    "transactions.name",
                    "transactions.amount",
                    "transactions.reference",
                    "categories.name AS category_name",
                    "accounts.name AS account_name",
                    "transaction_categories.name AS transaction_category_name",
                    "users.name AS user_name",
                );

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('Actions', 'transaction/datatables/actions')
                ->rawColumns(['Actions'])
                ->make(true);
        }

        return view('transaction.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'transactionCategories' => TransactionCategory::all(),
            'categories'     =>     Category::all(),
            'accounts'     =>     Account::all(),
        ];

        return view('transaction.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {

        $transaction = auth()->user()->transactions()->create($request->validated());

        return redirect()->route('transactions.index')->withSuccessMessage('Transaction Created');
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
    public function edit(Transaction $transaction)
    {
        $data = [
            'transaction' => $transaction,
            'transactionCategories' => TransactionCategory::all(),
            'categories'     =>     Category::all(),
            'accounts'     =>     Account::all(),
        ];

        return view('transaction.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->update($request->validated());
        return redirect()->route('transactions.index')->withSuccessMessage('Transaction Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = new Transaction();
        $transaction->deleteData($id);
        return response()->json(['success' => 'Transaction Deleted']);
    }
}
