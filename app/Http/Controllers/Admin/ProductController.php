<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $productList = Product::with('category')->paginate(10); // Paginate results
        return view('admin.products.index', compact('productList'));
    }

    public function create(Request $request)
    {
        if ($request->user()->role !== 'admin') {
            // Nếu không phải admin, chuyển hướng hoặc trả về lỗi
            return redirect()->back()->with('error', 'Bạn không có quyền truy cập tính năng này.');
        }
        
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if ($request->user()->role !== 'admin') {
            // Nếu không phải admin, chuyển hướng hoặc trả về lỗi
            return redirect()->back()->with('error', 'Bạn không có quyền truy cập tính năng này.');
        }
        
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        $product = Product::create([
            'img' => $imagePath,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'category_id' => $request->input('category_id'),
        ]);

        $message = $product ? "Successfully created" : "Creation failed";

        return redirect()->route('Admin.products.index')->with('message', $message);
    }

    public function edit($id , Request $request)
    {
        if ($request->user()->role !== 'admin') {
            // Nếu không phải admin, chuyển hướng hoặc trả về lỗi
            return redirect()->back()->with('error', 'Bạn không có quyền truy cập tính năng này.');
        }
       
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        if ($request->user()->role !== 'admin') {
            // Nếu không phải admin, chuyển hướng hoặc trả về lỗi
            return redirect()->back()->with('error', 'Bạn không có quyền truy cập tính năng này.');
        }
        $product = Product::findOrFail($id);

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            if ($product->img) {
                Storage::disk('public')->delete($product->img);
            }
            $product->img = $imagePath;
        }

        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('Admin.products.index')->with('message', 'Product updated successfully.');
    }

    public function destroy($id, Request $request)
    {
        if ($request->user()->role !== 'admin') {
            // Nếu không phải admin, chuyển hướng hoặc trả về lỗi
            return redirect()->back()->with('error', 'Bạn không có quyền truy cập tính năng này.');
        }
        $product = Product::findOrFail($id);

        if ($product->img) {
            Storage::disk('public')->delete($product->img);
        }

        $product->delete();

        return redirect()->route('Admin.products.index')->with('message', 'Product deleted successfully.');
    }
}
