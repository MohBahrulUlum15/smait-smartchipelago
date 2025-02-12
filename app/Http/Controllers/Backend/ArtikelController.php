<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    // create function index, create, store, edit, update, destroy
    public function index()
    {
        // get all data from artikel table where on_delete is false
        $artikel = Artikel::where('on_delete', false)->get();
        // return view with page_title and data
        return view(
            'backend.pages.artikel.index',
            [
                'pageTitle' => 'Artikel',
                'data' => $artikel,
            ]
        );
    }

    public function create()
    {
        // return view with page_title
        return view(
            'backend.pages.artikel.create',
            [
                'pageTitle' => 'Tambah Artikel',
            ]
        );
    }

    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'judul_artikel' => 'required|string|max:255',
            'isi_artikel' => 'required|string',
            'gambar_artikel' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // get gambar_artikel from request
        $gambar_artikel = $request->file('gambar_artikel');
        // generate gambar_artikel name
        $gambar_artikelName = $this->generateImageName($request->judul_artikel, $gambar_artikel->getClientOriginalExtension());
        // save gambar_artikel to storage
        $gambar_artikelPath = $this->saveImageToStorage($gambar_artikel, $gambar_artikelName);

        // create new artikel
        Artikel::create([
            'judul_artikel' => $request->judul_artikel,
            'isi_artikel' => $request->isi_artikel,
            'gambar_artikel' => $gambar_artikelPath,
            'on_delete' => false,
        ]);

        // redirect to index with success message
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan');
    }

    public function edit($id)
    {
        // get artikel by id
        $artikel = Artikel::findOrFail($id);
        // return view with page_title and data
        return view(
            'backend.pages.artikel.edit',
            [
                'page_title' => 'Edit Artikel',
                'data' => $artikel,
            ]
        );
    }

    public function update(Request $request, $id)
    {
        // validate request
        $request->validate([
            'judul_artikel' => 'required|string|max:255',
            'isi_artikel' => 'required|string',
            'gambar_artikel' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // get artikel by id
        $artikel = Artikel::findOrFail($id);

        // check if request has gambar_artikel
        if ($request->hasFile('gambar_artikel')) {
            $oldImagePath = str_replace('/storage', '', $artikel->gambar_artikel);
            Storage::disk('public')->delete($oldImagePath);

            $gambar_artikel = $request->file('gambar_artikel');
            $gambar_artikelName = $this->generateImageName($request->judul_artikel, $gambar_artikel->getClientOriginalExtension());
            $gambar_artikelPath = $this->saveImageToStorage($gambar_artikel, $gambar_artikelName);
        } else {
            // if request has no gambar_artikel, use the old gambar_artikel
            $gambar_artikelPath = $artikel->gambar_artikel;
        }

        // update artikel
        $artikel->update([
            'judul_artikel' => $request->judul_artikel,
            'isi_artikel' => $request->isi_artikel,
            'gambar_artikel' => $gambar_artikelPath,
        ]);

        // redirect to index with success message
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diubah');
    }

    public function destroy($id)
    {
        // get artikel by id
        $artikel = Artikel::findOrFail($id);
        // update on_delete to true
        $artikel->update(['on_delete' => true]);
        // redirect to index with success message
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus');
    }

    private function generateImageName($title, $extension)
    {
        return Str::slug($title) . '-' . time() . '-' . Str::random(3) . '.' . $extension;
    }

    private function saveImageToStorage($image, $imageName)
    {
        $path = 'uploads/artikel/' . $imageName;

        // Store the image
        Storage::disk('public')->put($path, file_get_contents($image));

        // Return the public path
        return Storage::url($path);
    }
}
