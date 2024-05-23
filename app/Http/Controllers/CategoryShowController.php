<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($category_id)
    {
        $category = Category::findOrFail($category_id);
        $products = $category->products; // Assuming you have a relationship defined in Category model
        return view('products.show', compact('products'));
    }

    
}
