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
    
    public function index(Request $request)
    {
        $categoryList = Category::all();
        return view('home.category', compact('categoryList'));
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
        return view('home.category', compact('category', 'products'));
    }

   
   
}
