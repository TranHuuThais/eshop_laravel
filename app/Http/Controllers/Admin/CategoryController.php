<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('Admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['img'] = '/img/' . $request['img'];
        $category = Category::create($request->only([
            'name', 'description', 'img'
        ]));
        $message = "Create success!";
        if (empty($category))
            $message = "Create fail!";

        return redirect()->route("Admin.categories.index")->with('message', $message);
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
        $category = Category::findOrFail($id);
        return view('Admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->only([
            'name', 'description'
        ]));
        $message = "Updated successfully!";
        if ($category === null) {
            $message = "Update failed!";
        }
        return redirect()->route("Admin.categories.index")->with('message', $message);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        // Kiểm tra xem danh mục có sản phẩm liên kết hay không
        if ($category->products()->count() > 0) {
            // Nếu có, trả về thông báo lỗi
            return redirect()->route("Admin.categories.index")
                ->with('message', "Không thể xóa danh mục này vì vẫn còn sản phẩm liên kết.");
        }

        // Nếu không có sản phẩm liên kết, tiến hành xóa danh mục
        $category->delete();

        return redirect()->route("Admin.categories.index")
            ->with('message', "Xóa danh mục thành công!");
    }
}
