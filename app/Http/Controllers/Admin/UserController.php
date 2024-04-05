<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userList = User::all();
        return view('Admin.users.index',['userList' => $userList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view( 'Admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'), // Ensure 'name' is included
           
            'email' => $request->input('email'),

            'password' => $request->input('password'),
            'role' => $request->input('role'),
        ]);
    
        $message = $user ? "Successfully created" : "Creation failed";
    
        return redirect()->route("Admin.users.index", ["id" => $user->id])->with("message", $message);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::findOrFail($id);
        return view('Admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user =User::findOrFail($id);
     $boll=   $user->update($request->only(['name','email','password']));
        $Message = "Successfully update message.";
        if(  !$boll){
             $Message = "Failed to update message.";
       
        }
        return redirect()->route('Admin.users.index')->with(['message' => $Message]);    ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $Message = "Success deleted ";
        if(!User::destroy($id)){
             $Message = "Failed to delete ";
       
        }
        return redirect()->route('Admin.users.index')->with(['message' => $Message]);    
    }
     
    }



