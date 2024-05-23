<?php

namespace App\Http\Controllers;

use App\Models\Order_items;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Order_items::all();
    }

    
    public function store(Request $request)
    {
        return Order_items::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Order_items::findOrFail($id);
    }


  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
     Order_items::findOrFail($id)->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Order_items::findOrFail($id)->destroy();
    }
}
