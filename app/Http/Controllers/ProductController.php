<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Throwable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $priceRanges = [
            '0-50' => [0, 50],
            '100-200' => [50, 100],
            '200-300' => [100, 200],
            '300-400' => [200, 300],
        ];

        $priceCounts = [];
        foreach ($priceRanges as $range => $prices) {
            $priceCounts[$range] = Product::whereBetween('price', $prices)->count();
        }

        $query = Product::query();

        // Filter by price ranges
        if ($request->has('price')) {
            $selectedPriceRanges = $request->input('price');
            $query->where(function ($query) use ($selectedPriceRanges, $priceRanges) {
                foreach ($selectedPriceRanges as $range) {
                    if (isset($priceRanges[$range])) {
                        $query->orWhereBetween('price', $priceRanges[$range]);
                    }
                }
            });
        }
        // Filter by category
        if ($request->has('category')) {
            $selectedCategories = $request->input('category');
            $query->whereHas('categories', function ($query) use ($selectedCategories) {
                $query->whereIn('id', $selectedCategories);
            });
        }


        // Search by product name
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%$search%");
        }

        // Sort products
        if ($request->has('sort')) {
            $sort = $request->input('sort');
            if ($sort == 'asc') {
                $query->orderBy('name', 'asc');
            } elseif ($sort == 'desc') {
                $query->orderBy('name', 'desc');
            } elseif ($sort == 'latest') {
                $query->orderBy('created_at', 'desc');
            }
        }

        $productList = $query->paginate(6);

        return view('Products.index', ['productList' => $productList, 'priceCounts' => $priceCounts, 'categories' => $categories]);
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
        $products = Product::findOrFail($id);
        return view('Products.show', ['product' => $products]);
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
        Product::findOrFail($id)->delete();
    }

    /**
     * Search for products based on a search query.
     */
    public function search(Request $request)
    {
        try {
            $query = $request->input('search');
            $productSearch = Product::where('name', 'LIKE', "%$query%")->paginate(8);
            return view('products.index', compact('productSearch'));
        } catch (Throwable $th) {
            return $th;
        }
    }
}
