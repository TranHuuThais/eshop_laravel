<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userList = User::all();
        return view('Admin.users.index', compact('userList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // kiểm tra quyền (check permissions)
        if(Gate::denies('create', User::class)) {
            return redirect()->back()->with('error', 'Bạn không có quyền tạo người dùng.');
        }
        return view('Admin.users.create');
    }

    public function store(Request $request)
    {
        // check permissions
        if(Gate::denies('create', User::class)) {
            return redirect()->back()->with('error', 'Bạn không có quyền tạo người dùng.');
        }
        $user = User::create($request->only([
            'name', 'email', 'password', 'role'
        ]));
        $message = "Create success!";
        if (empty($user))
            $message = "Create fail!";

        return redirect()->route("Admin.users.index")->with('message', $message);
    }

    public function edit(string $id)
    {
        // Check permissions
        $targetUser = User::findOrFail($id);
        if (Gate::denies('update', [$targetUser])) {
            return redirect()->back()->with('error', 'Bạn không có quyền edit người dùng.');
        }
        $user = User::findOrFail($id);
        return view('Admin.users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');
    
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
    
        $user->save();
    
        return redirect()->route('Admin.users.index')->with('message', 'User updated successfully!');
    }
    

    public function destroy(string $id)
    {
        // check permissions
        $targetUser = User::findOrFail($id);
        if(Gate::denies('destroy', [$targetUser])) {
            return redirect()->back()->with('error', 'Bạn không có quyền xóa người dùng.');
        }
        $user = User::findOrFail($id);
       
        $user->delete();
        return redirect()->route("Admin.users.index")->with('message', 'Xoá người dùng thành công!');
    }
}