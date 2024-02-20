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
        $allUsers = UserModel::all();
        return view('sharedTransactions.index', compact('sharedTransactions','allUsers'));
    }


    /**
     * Show the form for creating a new resource.
     */
   /*  public function create(){
        return view('sharedTransactions.create');
    } */
    public function create(){
        $allUsers = UserModel::all();
        return view('sharedTransactions.create', compact('allUsers'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            //'user_id' => 'required|exists:all_users,id',
            //'transaction_id' => 'required|exists:all_transactions,id',
            'amount' => 'nullable|numeric|min:0',
            'user_paid' => 'required|exists:all_users,id',
            //'user_paid' => 'sometimes|required|exists:all_users,id',
            //'number_of_participants' => 'required|integer|min:1',
            //'name_of_participants' => 'required|string',
            'amount_per_participant' => 'nullable|numeric|min:0',
            'date' => 'required|date',
            'description' => 'required|string',
            'approval_status' => 'required|in:pending,approved,rejected',
            'note' => 'required|string',
        ], [
            'amount.min' => 'The amount must be at least 0.',
            'name_of_participants.required' => 'At least one participant is required.',
            'date.required' => 'Date required.',
            'description.required' => 'Description required.',
            'approval_status.in' => 'The approval status must be one of: pending, approved, rejected.',
            'note.required' => 'The note is required.',
        ]);

        $request->merge([
            'name_of_participants' => json_encode($request->input('name_of_participants')),
        ]);

        // SharedTransactionModel::create($request->all());
        SharedTransactionModel::create([
            'user_id' => $request->user_paid,
            'amount' => $request->amount,
            'user_paid' => $request->user_paid,
            //'number_of_participants' => $request->number_of_participants,
            // 'name_of_participants' => $request->name_of_participants,
            'name_of_participants' => $request->input('name_of_participants'),
            'amount_per_participant' => $request->amount_per_participant,
            'date' => $request->date,
            'description' => $request->description,
            'approval_status' => $request->approval_status,
            'note' => $request->note,
        ]);
        return redirect()->route('shared_transactions.index')
            ->with('success', 'Shared Transaction created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $sharedTransaction = SharedTransactionModel::find($id);

        $participantIds = json_decode($sharedTransaction->name_of_participants);

        $participantNames = UserModel::whereIn('id', $participantIds)->get()->pluck('full_name')->toArray();

        return view('sharedTransactions.show', compact('sharedTransaction','participantNames'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $sharedTransaction = SharedTransactionModel::find($id);
        $allUsers = UserModel::all();

        /* if (!$sharedTransaction) {
            return redirect()->route('shared_transactions.index')
                ->with('error', 'Shared Transaction not found.');
        } */

        return view('sharedTransactions.edit', compact('sharedTransaction','allUsers'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $request->validate([
            //'user_id' => 'required|exists:all_users,id',
            //'transaction_id' => 'required|exists:all_transactions,id',
            'amount' => 'nullable|numeric|min:0',
            'user_paid' => 'required|exists:all_users,id',
            //'number_of_participants' => 'required|integer|min:1',
            'name_of_participants' => 'required|array',
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

        $nameOfParticipants = $request->input('name_of_participants');
        if (is_array($nameOfParticipants)) {
            $nameOfParticipants = json_encode($nameOfParticipants);
        }

        // $sharedTransaction->update($request->all());
        $sharedTransaction->update([
            'amount' => $request->amount,
            'user_paid' => $request->user_paid,
            'name_of_participants' => $nameOfParticipants,
            'amount_per_participant' => $request->amount_per_participant,
            'date' => $request->date,
            'description' => $request->description,
            'approval_status' => $request->approval_status,
            'note' => $request->note,
        ]);

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
