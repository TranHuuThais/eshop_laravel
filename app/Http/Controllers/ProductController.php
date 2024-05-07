<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Throwable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productList = Product::paginate(8);
     return view('Products.index',['productList'=> $productList]);
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
        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)

    
    {
        $products =product::findOrFail($id);
        return view('Products.show',['product' => $products]);
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
        // try {
        //     // return $request->all();
        //     Product::findOrFail($id)->update($request->all());
        // } catch (\Throwable $th) {
        //     dd($th);
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::findOrFail($id)->destroy($id);
    }
    public function search(Request $request)
    {
        // try {
        //     $query = $request->input('search');
        //     //    dd($query);
        //     //để thực hiện một truy vấn đến cơ sở dữ liệu
        //     $productSearch = Product::where('name', 'LIKE', "%$query%")->get();
        //     return view('products.search', compact('productSearch'));
        // } catch (Throwable $th) {
        //     return $th;
        // }
}
}
