<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        //return view('user');
        $users = UserModel::all();
        //echo $users;
        return view('user', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view ('user.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'first_name' => 'required|string',
            'last_name'=>'required|string',
            'mail_adress'=>'required|email|unique:all_users,mailadress',
            'password'=>'required|string'
        ]);

        UserModel::create($request->all());
        return redirect()->route("user.index")
            ->with('success','User added successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $user = UserModel::find($id);
        return view('user.show', compact('user'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $user = UserModel::find($id);
        return view('user.edit', compact('user'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $request->validate([
            'first_name' => 'required|string',
            'last_name'=>'required|string',
            'mail_adress'=>'required|email|unique:all_users,mailadress,' . $id,
            'password'=>'required|string'
        ]);

        $user = UserModel::find($id);

        if (!$user) {
            return redirect()->route("user")
                ->with('error', 'User not found.');
        }

        $user->update($request->all());

        return redirect()->route('user.index')
            ->with('success','User updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $user = UserModel::find($id);
        $user -> delete();
        return redirect()->route('user')
            ->with('success','User deleted successfully');
    }

}
