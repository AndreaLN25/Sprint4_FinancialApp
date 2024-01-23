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
        return view('users.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view ('users.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'first_name' => 'required|string',
            'last_name'=>'required|string',
            'mailadress'=>'required|email|unique:all_users,mailadress',
            'password'=>'required|string'
        ]);

        UserModel::create($request->all());
        return redirect()->route("users.index")
            ->with('success','User added successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $user = UserModel::find($id);
        return view('users.show', compact('user'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $user = UserModel::find($id);

        
/*     if (!$user) {
        return redirect()->route("users.index")->with('error', 'User not found.');
    } */
        return view('users.edit', compact('user'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $request->validate([
            'first_name' => 'required|string',
            'last_name'=>'required|string',
            'mailadress'=>'required|email|unique:all_users,mailadress,' . $id,
            'password'=>'required|string'
        ]);

        $user = UserModel::find($id);

        if (!$user) {
            return redirect()->route("users.index")
                ->with('error', 'User not found.');
        }

        $user->update($request->all());

        return redirect()->route('users.show', ['id' => $user->id])
            ->with('success','User updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $user = UserModel::find($id);

        if (!$user) {
            return redirect()->route('users.index')
                ->with('error', 'User not found.');
        }
        
        $user -> delete();
        return redirect()->route('users.index')
            ->with('success','User deleted successfully');
    }

}
