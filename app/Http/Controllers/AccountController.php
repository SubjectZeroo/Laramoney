<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\Account;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:accounts.create')->only('create', 'store');
        $this->middleware('can:accounts.edit')->only('edit', 'update');
        $this->middleware('can:accounts.destroy')->only('destroy');
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

            $data = Account::select('*');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('Actions', 'account/datatables/actions')
                ->rawColumns(['Actions'])
                ->make(true);
        }


        return view('account.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccountRequest $request)
    {


        $account = Account::create($request->validated());
        return redirect()->route('accounts.index')->withSuccessMessage('Account Created');
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
    public function edit(Account $account)
    {
        return view('account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccountRequest $request, Account $account)
    {
        $account->update($request->validated());

        return redirect()->route('accounts.index')->withSuccessMessage('Account Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = new Account();
        $account->deleteData($id);
        return response()->json(['success' => 'Account Deleted']);
    }
}
