<?php

namespace App\Http\Controllers;
use App\Models\Product as ModelsProduct;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( request $request)
    {
        $query = $request->input('search');
        $productSearch = ModelsProduct::where('name', 'LIKE', "%$query%")->get();
        // $productSearch = ModelsProduct::where('name', 'LIKE', '%$query%')->get(); ko loi nhung ko show dc
        return view('home.search', compact('productSearch'));
    }

   
}
