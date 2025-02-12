<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Karya;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class KaryaController extends Controller
{
    // create function index, create, store, edit, update, destroy
    public function index()
    {
        // get all data from karya table where on_delete is false
        $karya = Karya::where('on_delete', false)->get();
        // return view with page_title and data
        return view(
            'backend.pages.karya.index',
            [
                'pageTitle' => 'Karya',
                'data' => $karya,
            ]
        );
    }

    public function create()
    {
        // return view with page_title
        return view(
            'backend.pages.karya.create',
            [
                'pageTitle' => 'Tambah Karya',
            ]
        );
    }

    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'judul_karya' => 'required|string|max:255',
            'deskripsi_karya' => 'required|string',
            'gambar_karya' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // get gambar_karya from request
        $gambar_karya = $request->file('gambar_karya');
        // generate gambar_karya name
        $gambar_karyaName = $this->generateImageName($request->judul_karya, $gambar_karya->getClientOriginalExtension());
        // save gambar_karya to storage
        $gambar_karyaPath = $this->saveImageToStorage($gambar_karya, $gambar_karyaName);

        // create new karya
        Karya::create([
            'judul_karya' => $request->judul_karya,
            'deskripsi_karya' => $request->deskripsi_karya,
            'gambar_karya' => $gambar_karyaPath,
            'on_delete' => false,
        ]);

        // redirect to index with success message
        return redirect()->route('karya.index')->with('success', 'Karya berhasil ditambahkan');
    }

    public function edit($id)
    {
        // get karya by id
        $karya = Karya::findOrFail($id);
        // return view with page_title and data
        return view(
            'backend.pages.karya.edit',
            [
                'page_title' => 'Edit Karya',
                'data' => $karya,
            ]
        );
    }

    public function update(Request $request, $id)
    {
        // validate request
        $request->validate([
            'judul_karya' => 'required|string|max:255',
            'deskripsi_karya' => 'required|string',
            'gambar_karya' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // get karya by id
        $karya = Karya::findOrFail($id);

        // check if request has gambar_karya
        if ($request->hasFile('gambar_karya')) {
            $oldImagePath = str_replace('/storage', '', $karya->gambar_karya);
            Storage::disk('public')->delete($oldImagePath);

            $gambar_karya = $request->file('gambar_karya');
            $gambar_karyaName = $this->generateImageName($request->judul_karya, $gambar_karya->getClientOriginalExtension());
            $gambar_karyaPath = $this->saveImageToStorage($gambar_karya, $gambar_karyaName);
        } else {
            // if request has no gambar_karya, use the old gambar_karya
            $gambar_karyaPath = $karya->gambar_karya;
        }

        // update karya
        $karya->update([
            'judul_karya' => $request->judul_karya,
            'deskripsi_karya' => $request->deskripsi_karya,
            'gambar_karya' => $gambar_karyaPath,
        ]);

        // redirect to index with success message
        return redirect()->route('karya.index')->with('success', 'Karya berhasil diubah');
    }

    public function destroy($id)
    {
        // get karya by id
        $karya = Karya::findOrFail($id);
        // update on_delete to true
        $karya->update(['on_delete' => true]);
        // redirect to index with success message
        return redirect()->route('karya.index')->with('success', 'Karya berhasil dihapus');
    }

    private function generateImageName($title, $extension)
    {
        return Str::slug($title) . '-' . time() . '-' . Str::random(3) . '.' . $extension;
    }

    private function saveImageToStorage($image, $imageName)
    {
        $path = 'uploads/karya/' . $imageName;

        // Store the image
        Storage::disk('public')->put($path, file_get_contents($image));

        // Return the public path
        return Storage::url($path);
    }
}
