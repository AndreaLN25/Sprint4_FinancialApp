<?php

namespace App\Http\Controllers;

use App\Models\TransactionModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        //
        $transactions = TransactionModel::all();
        $users = UserModel::all();

        return view('transactions.index', compact('transactions', 'users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $users = UserModel::all();
        return view ('transactions.create', compact('users'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'movement_type' => ['required', Rule::in(['income', 'expense'])],
            'user_id' => 'required|exists:all_users,id',
            'description' => 'required|string',
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'completed' => ['required', Rule::in(['yes', 'no'])],
            'category_income' =>  $request->input('movement_type') == 'income' ? ['required', Rule::in(['salary', 'interest', 'investment', 'rent'])] : 'nullable',
            'category_expense' => $request->input('movement_type') == 'expense' ? ['required', Rule::in(['leisure', 'restaurant', 'transport', 'health', 'clothing', 'others'])] : 'nullable',
            'payment_method_income' => $request->input('movement_type') == 'income'? ['nullable', Rule::in(['cash', 'transfer', 'check', 'bizum'])] : 'nullable',
            'payment_method_expense' => $request->input('movement_type') == 'expense' ? ['nullable', Rule::in(['cash', 'transfer', 'check', 'bizum', 'card'])] : 'nullable',
        ]);

        // TransactionModel::create($request->all());

        TransactionModel::create([
            'movement_type' => $request->input('movement_type'),
            'user_id' => $request->input('user_id'), // Asigna el ID del usuario seleccionado
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'amount' => $request->input('amount'),
            'completed' => $request->input('completed'),
            'category_income' => $request->input('category_income'),
            'category_expense' => $request->input('category_expense'),
            'payment_method_income' => $request->input('payment_method_income'),
            'payment_method_expense' => $request->input('payment_method_expense'),
        ]);

        return redirect()->route('transactions.index')
            ->with('success','Transaction created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $transaction = TransactionModel::find($id);
        return view('transactions.show', compact('transaction'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $transaction = TransactionModel::find($id);
        $users = UserModel::all();

        $userExists = $users->contains('id', $transaction->user_id);

        if (!$userExists) {
            $user = UserModel::find($transaction->user_id);
            $users->push($user);
        }

    /*if (!$transaction) {
        return redirect()->route("transactions.index")->with('error', 'Transaction not found.');
    } */
        return view('transactions.edit',compact('transaction','users'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $request->validate([
            'movement_type' => ['required', Rule::in(['income', 'expense'])],
            'user_id' => 'required|exists:all_users,id',
            'description' => 'required|string',
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'completed' => ['required', Rule::in(['yes', 'no'])],
            'category_income' => $request->input('movement_type') == 'income' ? ['required', Rule::in(['salary', 'interest', 'investment', 'rent'])] : 'nullable',
            'category_expense' => $request->input('movement_type') == 'expense' ? ['required', Rule::in(['leisure', 'restaurant', 'transport', 'health', 'clothing', 'others'])] : 'nullable',
            'payment_method_income' => $request->input('movement_type') == 'income' ? ['nullable', Rule::in(['cash', 'transfer', 'check', 'bizum'])] : 'nullable',
            'payment_method_expense' => $request->input('movement_type') == 'expense' ? ['nullable', Rule::in(['cash', 'transfer', 'check', 'bizum', 'card'])] : 'nullable',
        ]);

        $transaction = TransactionModel::find($id);

        if (!$transaction) {
            return redirect()->route('transactions.index')
                ->with('error', 'Transaction not found.');
        }

        $transaction->update($request->all());

        return redirect()->route('transactions.show', ['id' => $transaction->id])
            ->with('success', 'Transaction updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $transaction = TransactionModel::find($id);

        if (!$transaction) {
            return redirect()->route('transactions.index')
                ->with('error', 'Transaction not found.');
        }

        $transaction->delete();
        return redirect()->route('transactions.index')
            ->with('success', 'Transaction deleted successfully');
    }
}
