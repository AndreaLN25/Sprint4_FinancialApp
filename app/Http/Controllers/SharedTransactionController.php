<?php

namespace App\Http\Controllers;

use App\Models\SharedTransactionModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class SharedTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $sharedTransactions = SharedTransactionModel::all();
        return view('sharedTransactions.index', compact('sharedTransactions'));
    }



    /**
     * Show the form for creating a new resource.
     */
   /*  public function create(){
        return view('sharedTransactions.create');
    } */
    public function create(){
        $allUsers = UserModel::all(); // Obtén la lista de todos los usuarios
        return view('sharedTransactions.create', compact('allUsers'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'user_id' => 'required|exists:all_users,id',
            //'transaction_id' => 'required|exists:all_transactions,id',
            'amount' => 'nullable|numeric|min:0',
            //'user_paid' => 'required|string',
            'user_paid' => 'sometimes|required|exists:all_users,id',
            'number_of_participants' => 'required|integer|min:1',
            'name_of_participants' => 'required|string',
            'amount_per_participant' => 'nullable|numeric|min:0',
            'date' => 'required|date',
            'description' => 'required|string',
            'approval_status' => 'required|in:pending,approved,rejected',
            'note' => 'required|string',
        ]);

        SharedTransactionModel::create($request->all());
        return redirect()->route('shared_transactions.index')
            ->with('success', 'Shared Transaction created successfully');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $sharedTransaction = SharedTransactionModel::find($id);
        return view('sharedTransactions.show', compact('sharedTransaction'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $sharedTransaction = SharedTransactionModel::find($id);

        /* if (!$sharedTransaction) {
            return redirect()->route('shared_transactions.index')
                ->with('error', 'Shared Transaction not found.');
        } */

        return view('sharedTransactions.edit', compact('sharedTransaction'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $request->validate([
            'user_id' => 'required|exists:all_users,id',
            //'transaction_id' => 'required|exists:all_transactions,id',
            'amount' => 'nullable|numeric|min:0',
            //'user_paid' => 'required|integer',
            'number_of_participants' => 'required|integer|min:1',
            'name_of_participants' => 'required|string',
            'amount_per_participant' => 'nullable|numeric|min:0',
            'date' => 'required|date',
            'description' => 'required|string',
            'approval_status' => 'required|in:pending,approved,rejected',
            'note' => 'required|string',
        ]);

        $sharedTransaction = SharedTransactionModel::find($id);

        if (!$sharedTransaction) {
            return redirect()->route('shared_transactions.index')
                ->with('error', 'Shared Transaction not found.');
        }

        $sharedTransaction->update($request->all());

        return redirect()->route('shared_transactions.show', ['shared_transaction' => $sharedTransaction->id])
            ->with('success', 'Shared Transaction updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $sharedTransaction = SharedTransactionModel::find($id);

        if (!$sharedTransaction) {
            return redirect()->route('shared_transactions.index')
                ->with('error', 'Shared Transaction not found.');
        }

        $sharedTransaction->delete();
        return redirect()->route('shared_transactions.index')
            ->with('success', 'Shared Transaction deleted successfully');
    }
}
