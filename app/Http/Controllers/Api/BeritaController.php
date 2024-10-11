<?php

namespace App\Http\Controllers\Api;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BeritaResource;

class BeritaController extends Controller
{
    //
    public function index()
    {
        $berita = Berita::latest()->paginate(10);
        return new BeritaResource(200, 'Succes Get List Berita', $berita);
    }
    public function show($id)
    {
        $berita = Berita::find($id);
        return new BeritaResource(200, 'Success get detail berita', $berita);
    }
}
