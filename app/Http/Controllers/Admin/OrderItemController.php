<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_items;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orderItems = Order_items::all();
        return view('Admin.orderItems.index', compact('orderItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $products = Product::all();
        $orders = Order::all();
        return view('Admin.orderItems.create', compact('products', 'orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $orderItem = Order_items::create($request->only([
            'product_id', 'order_id', 'quantity', 'price'
        ]));
        $message = "Create success!";
        if(empty($orderItem))
        $message = "Create fail!";
        
        return redirect()->route("Admin.orderItems.index")->with('message', $message);

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
        //
        $products = Product::all();
        $orders = Order::all();
        $orderItem = Order_items::findOrFail($id);
        return view('Admin.orderItems.edit', compact('orderItem', 'products', 'orders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $orderItem = Order_items::findOrFail($id);
        $orderItem -> update($request->only([
            'code', 'status', 'user_id'
        ]));
        $message = "Updated successfully!";
        if ($orderItem === null) {
            $message = "Update failed!";
        }
        return redirect()->route("Admin.orderItems.index")->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $orderItem = Order_items::destroy($id);
        // dd($user);
        $message = "Delete successfully!";
        if ($orderItem === null) {
            $message = "Update failed!";
        }
        return redirect()->route("Admin.orderItems.index")->with('message', $message);

    }
}