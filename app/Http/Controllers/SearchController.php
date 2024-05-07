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
        //
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
