<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::resource('/incomes', [App\Http\Controllers\IncomeController::class, 'index'])->name('income');
    // Route::resource('/expenses', [App\Http\Controllers\ExpenseController::class, 'index'])->name('expense');
    Route::resource('/roles', App\Http\Controllers\RoleController::class);
    Route::resource('/transactions', App\Http\Controllers\TransactionController::class);
    Route::get('/transactions/income/total', [App\Http\Controllers\TransactionController::class, 'IncomeTotalByMonth']);
    Route::resource('/accounts', App\Http\Controllers\AccountController::class);
    Route::resource('/budgets', App\Http\Controllers\BudgetController::class);
    Route::resource('/goals', App\Http\Controllers\GoalController::class);
    Route::resource('/categories', App\Http\Controllers\CategoryController::class);
    Route::resource('/users', App\Http\Controllers\UserController::class);
});
