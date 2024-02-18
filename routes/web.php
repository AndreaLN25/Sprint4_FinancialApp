<?php

use App\Http\Controllers\SharedTransactionController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
});
 */


 //*****HomePage*****
 Route::get('/', function () {
    return view('index');
 });

// User
Route::resource('users', UserController::class);

// Transaction
Route::resource('transactions', TransactionController::class);

// SharedTransaction
Route::resource('shared_transactions', SharedTransactionController::class);
