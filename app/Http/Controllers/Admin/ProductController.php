<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $productList = Product::all();
       return view('Admin.products.index',['productList' => $productList]);

    }
      
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view( 'Admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $product = Product::create([
            'img' => $request->input('img'), // Ensure 'name' is included
            'name' => $request->input('name'), // Ensure 'name' is included
           
            'description' => $request->input('description'),

            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
        ]);
    
        $message = $product ? "Successfully created" : "Creation failed";
    
        return redirect()->route("Admin.products.index", ["id" => $product->id])->with("message", $message);
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
        $product =Product::findOrFail($id);
        return view('Admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product =Product::findOrFail($id);
        $boll=   $product->update($request->only(['img','name','description','price','quantity']));
           $Message = "Successfully update message.";
           if(  !$boll){
                $Message = "Failed to update message.";
          
           }
           return redirect()->route('Admin.products.index')->with(['message' => $Message]);    ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Message = "Success deleted ";
        if(!Product::destroy($id)){
             $Message = "Failed to delete ";
       
        }
        return redirect()->route('Admin.products.index')->with(['message' => $Message]);    
    }
}
