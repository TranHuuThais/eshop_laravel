<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productListHome = Product::paginate(8);
        return view('home.index',['productList'=> $productListHome]);
    }

  
  //contact
  public function contact()
  {
      //
      return view('home.contact');
  }

 
}
