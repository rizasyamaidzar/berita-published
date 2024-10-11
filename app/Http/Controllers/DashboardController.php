<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $countBerita = \App\Models\Berita::count();
        $countCategory = \App\Models\Category::count();
        return view('cms.dashboard', [
            "countBerita" => $countBerita,
            "countCategory" => $countCategory,
        ]);
    }
}
