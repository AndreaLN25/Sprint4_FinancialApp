<?php

namespace App\Http\Controllers;

use App\Models\TransactionModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        //
        $transaction = TransactionModel::all();
        return view('transactions.index', compact('transaction'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view ('transactions.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        //
        $request->validate([
            'movement_type' => ['required', Rule::in(['income', 'expense'])],
            'description' => 'required|string',
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'completed' => ['required', Rule::in(['yes', 'no'])],
            'category_income' =>  $request->input('movement_type') == 'income' ? ['required', Rule::in(['salary', 'interest', 'investment', 'rent'])] : 'nullable',
            'category_expense' => $request->input('movement_type') == 'expense' ? ['required', Rule::in(['leisure', 'restaurant', 'transport', 'health', 'clothing', 'others'])] : 'nullable',
            'payment_method_income' => $request->input('movement_type') == 'income'? ['nullable', Rule::in(['cash', 'transfer', 'check', 'bizum'])] : 'nullable',
            'payment_method_expense' => $request->input('movement_type') == 'expense' ? ['nullable', Rule::in(['cash', 'transfer', 'check', 'bizum', 'card'])] : 'nullable',
        ]);

        TransactionModel::create($request->all());
        return redirect('transactions.index')
            ->with('success','Transaction created successfully');
    }



    /**
     * Display the specified resource.
     */
    public function show(TransactionModel $transaction){
        return view ('transactions.show', compact('transaction'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $transaction = TransactionModel::find($id);
        return view('transactions.edit',compact('transaction'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){        
        $request->validate([
            'movement_type' => ['required', Rule::in(['income', 'expense'])],
            'description' => 'required|string',
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'completed' => ['required', Rule::in(['yes', 'no'])],
            'category_income' => 'nullable|string', // Ajusta según tu lógica
            'category_expense' => 'nullable|string', // Ajusta según tu lógica
            'payment_method_income' => ['nullable', Rule::in(['cash', 'transfer', 'check', 'bizum'])],
            'payment_method_expense' => ['nullable', Rule::in(['cash', 'transfer', 'check', 'bizum', 'card'])],
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
