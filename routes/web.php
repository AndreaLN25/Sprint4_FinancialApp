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



//*******User********
//UserLists
Route::get('/users', [UserController::class, 'index'])->name('users.index');
//User Form Creation
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
//Store Data in DB
Route::post('/users', [UserController::class, 'store'])->name('users.store');
//Display specific user information
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
//Edit User Form
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
//Update User Information
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
//Delete a User from DB
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');




//******Transaction*******
//TransactionList
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
//Create Transaction
Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
// Store Data in DB
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
// Display specific transaction information
Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');
// Edit Transaction Form
Route::get('/transactions/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
// Update Transaction Information
Route::put('/transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');
// Delete a Transaction from DB
Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');




//******SharedTransactions*******
//Route::resource('shared_transactions', SharedTransactionController::class);

//SharedTransactionsGroupList
Route::get('/shared_transactions', [SharedTransactionController::class, 'index'])->name('shared_transactions.index');
//Shared Transaction From
Route::get('/shared_transactions/create', [SharedTransactionController::class, 'create'])->name('shared_transactions.create');
//Store Data in DB
Route::post('/shared_transactions', [SharedTransactionController::class, 'store'])->name('shared_transactions.store');
// Display specific shared transaction information
Route::get('/shared_transactions/{shared_transaction}', [SharedTransactionController::class, 'show'])->name('shared_transactions.show');
// Edit SharedTransaction Form
Route::get('/shared_transactions/{shared_transaction}/edit', [SharedTransactionController::class, 'edit'])->name('shared_transactions.edit');
//Update 
Route::put('/shared_transactions/{shared_transaction}', [SharedTransactionController::class, 'update'])->name('shared_transactions.update');
// Delete from DB
Route::delete('/shared_transactions/{shared_transaction}', [SharedTransactionController::class, 'destroy'])->name('shared_transactions.destroy');
