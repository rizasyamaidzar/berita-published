<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Category;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function home()
    {
        return view('guest.home', [
            "hotnews" => Berita::where('status', 'published')->latest()->take(5)->get(),
        ]);
    }
    public function berita()
    {
        return view('guest.berita.index', [
            "hotnews" => Berita::where('status', 'published')->latest()->take(3)->get(),
            "beritas" => Berita::where('status', 'published')->filter(request(['search', 'category']))->with('category')->latest()->paginate(12),
        ]);
    }
    public function beritaView($judul)
    {
        $berita = Berita::where('judul', $judul)->first();
        return view('guest.berita.show', [
            'berita' => $berita
        ]);
    }
    public function error_page()
    {
        return view('error_page');
    }
}
