<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends ProductController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryList = Category::all();
        return view('home.showCategory', compact('categoryList'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {  
        // $category = Category::where('id', $id)->get();
        // $products = $category->products;
        // return view('home.showCategory', compact('category', 'products'));
        $category = Category::where('id', $id)->first(); // Retrieve a single category
        $products = $category->products; // Access products related to this category
        return view('home.showCategory', compact('category', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
