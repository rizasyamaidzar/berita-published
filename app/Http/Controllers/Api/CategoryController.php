<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $category = Category::latest()->paginate(10);
        return new CategoryResource(200, 'Succes Get List Category', $category);
    }
    public function show($id)
    {
        $category = Category::find($id);
        return new CategoryResource(200, 'Success get detail Category', $category);
    }
}
