<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $category = Category::all();
        return view('cms.category.index', [
            'title' => 'Category',
            'categories' =>  $category
        ]);
    }
    public function show($nama)
    {
        $category = Category::with('berita')->where('nama', $nama)->first();
        return view('cms.category.show', [
            'title' => $category->nama,
            'category' =>  $category
        ]);
    }
    public function addCategory(Request $request)
    {
        $validateData = $request->validate([
            "nama" => "required",
            "keterangan" => "required",

        ]);
        Category::create($validateData);
        return redirect('/category-management')->with("success", "New Category has been Delete!");
    }
    public function deleteCategory(Request $request)
    {
        Category::destroy($request->id);
        return redirect('/category-management')->with("success", "New Category has been Delete!");
    }
    public function updateCategory(Request $request)
    {
        $validateData = $request->validate([
            "nama" => "required",
            "keterangan" => "required",

        ]);
        Category::where("id", $request->id)->update($validateData);
        return redirect('/category-management')->with("success", "New Category has been Update!");
    }
}
