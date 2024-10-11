<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Category;
use Illuminate\Support\Str;
use DOMDocument;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBeritaRequest;
use App\Http\Requests\UpdateBeritaRequest;

class BeritaController extends Controller
{
    public function listBerita()
    {
        $berita = Berita::all();
        return view('cms.berita.index', [
            'title' => 'Berita',
            'beritas' => $berita
        ]);
    }
    public function showBerita($id)
    {
        $berita = Berita::where('id', $id)->first();
        return view('cms.berita.show', [
            'title' => 'Berita',
            'berita' => $berita
        ]);
    }
    public function createBerita()
    {
        $category = Category::all();
        return view('cms.berita.create', [
            'title' => 'Add Berita',
            'category' => $category
        ]);
    }
    public function addBerita(Request $request)
    {
        $validateData = $request->validate([
            "judul" => "required",
            "tanggal" => "required",
            "category_id" => "required",
            "editordata" => "required",
            "cover" => "required",

        ]);
        if ($request->status) {
            $validateData['status'] = $request->status;
        } else {
            $validateData['status'] = 'draft';
        }
        $artikel = $request->editordata;
        $dom = new DOMDocument();
        $dom->loadHTML($artikel, 9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/berita/foto-berita/" . time() . $key . '.' . 'png';
            file_put_contents(public_path() . $image_name, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
        $artikel = $dom->saveHTML();

        if ($request->file('cover')) {
            $image = $request->cover;
            $ext   = $image->getClientOriginalExtension();
            $randomString = Str::random(5);
            $imageName = $request->nama . '-' . $randomString . '.' . $ext;
            $image->move(public_path('berita/cover-berita'), $imageName);
            $validateData['cover'] = $imageName;
        }
        $validateData['artikel'] = $artikel;
        Berita::create($validateData);
        return redirect('/berita-management')->with("success", "New Berita has been Added!");
    }
    public function editBerita($id)
    {
        $berita = Berita::where('id', $id)->first();
        $category = Category::all();
        $status = [
            'published',
            'draft'
        ];
        return view('cms.berita.edit', [
            'title' => 'Edit Berita ' . $berita->judul,
            'berita' => $berita,
            'category' => $category,
            'status' => $status
        ]);
    }
    public function updateBerita(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            "judul" => "required",
            "tanggal" => "required",
            "category_id" => "required",
            "editordata" => "required",
        ]);
        if ($request->status) {
            $validateData['status'] = $request->status;
        } else {
            $validateData['status'] = 'draft';
        }

        $artikel = $request->editordata;
        $dom = new DOMDocument();
        $dom->loadHTML($artikel, 9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            if (strpos($img->getAttribute('src'), 'data:image/') === 0) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/berita/foto-berita/" . time() . $key . '.' . 'png';
                file_put_contents(public_path() . $image_name, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        $artikel = $dom->saveHTML();

        // update cover 
        if ($request->file('cover')) {
            if ($request->oldSampul) {
                $filePath = public_path('berita/cover-berita/' . $request->oldSampul);
                if (file_exists($filePath)) {
                    unlink($filePath); // Menghapus file
                }
            }
            $image = $request->cover;
            $ext   = $image->getClientOriginalExtension();
            $randomString = Str::random(5);
            $imageName = $request->nama . '-' . $randomString . '.' . $ext;
            $image->move(public_path('berita/cover-berita'), $imageName);
            $validateData['cover'] = $imageName;
        }
        $validateData['artikel'] = $artikel;

        $berita = Berita::find($request->id);
        $berita->update($validateData);
        return redirect('/berita-management')->with("success", "Berita has been Updated!");
    }
    public function deleteBerita(Request $request)
    {
        $berita = Berita::find($request->id);

        $dom = new DOMDocument();
        $dom->loadHTML($berita->artikel, 9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $path = $img->getAttribute('src');
            $paths = public_path($path);
            if (file_exists($paths)) {
                unlink($paths); // Menghapus file
            }
        }
        $berita->delete();
        return redirect('/berita-management')->with("success", "Berita has been Deleted!");
    }
}
