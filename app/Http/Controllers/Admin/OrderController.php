<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->user()->role !== 'admin') {
            // Nếu không phải admin, chuyển hướng hoặc trả về lỗi
            return redirect()->back()->with('error', 'Bạn không có quyền truy cập tính năng này.');
        }
        $users = User::all();
        return view('Admin.orders.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->user()->role !== 'admin') {
            // Nếu không phải admin, chuyển hướng hoặc trả về lỗi
            return redirect()->back()->with('error', 'Bạn không có quyền truy cập tính năng này.');
        }
        $order = Order::create($request->only([
            'code', 'status', 'user_id'
        ]));
        $message = "Create success!";
        if(empty($order))
        $message = "Create fail!";
        
        return redirect()->route("Admin.orders.index")->with('message', $message);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        if ($request->user()->role !== 'admin') {
            // Nếu không phải admin, chuyển hướng hoặc trả về lỗi
            return redirect()->back()->with('error', 'Bạn không có quyền truy cập tính năng này.');
        }
       
        $users = User::all();
        $order = Order::findOrFail($id);
        return view('Admin.orders.edit', compact('order', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->user()->role !== 'admin') {
            // Nếu không phải admin, chuyển hướng hoặc trả về lỗi
            return redirect()->back()->with('error', 'Bạn không có quyền truy cập tính năng này.');
        }
        $order = Order::findOrFail($id);
        $order->update($request->only([
            'code', 'status', 'user_id'
        ]));
        $message = "Updated successfully!";
        if ($order === null) {
            $message = "Update failed!";
        }
        return redirect()->route("Admin.orders.index")->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $order = Order::destroy($id);
        // dd($user);
        $message = "Delete successfully!";
        if ($order === null) {
            $message = "Update failed!";
        }
        return redirect()->route("Admin.orders.index")->with('message', $message);
    }
}