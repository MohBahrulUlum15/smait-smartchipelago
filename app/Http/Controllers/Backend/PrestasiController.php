<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    // create function index, create, store, edit, update, destroy
    public function index()
    {
        // get all data from prestasi table where on_delete is false
        $prestasi = Prestasi::where('on_delete', false)->get();
        // return view with page_title and data
        return view(
            'backend.pages.prestasi.index',
            [
                'pageTitle' => 'Prestasi',
                'data' => $prestasi,
            ]
        );
    }

    public function create()
    {
        // return view with page_title
        return view(
            'backend.pages.prestasi.create',
            [
                'pageTitle' => 'Tambah Prestasi',
            ]
        );
    }

    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'judul_prestasi' => 'required|string|max:255',
            'deskripsi_prestasi' => 'required|string',
            'gambar_prestasi' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // get gambar_prestasi from request
        $gambar_prestasi = $request->file('gambar_prestasi');
        // generate gambar_prestasi name
        $gambar_prestasiName = $this->generateImageName($request->judul_prestasi, $gambar_prestasi->getClientOriginalExtension());
        // save gambar_prestasi to storage
        $gambar_prestasiPath = $this->saveImageToStorage($gambar_prestasi, $gambar_prestasiName);

        // create new prestasi
        Prestasi::create([
            'judul_prestasi' => $request->judul_prestasi,
            'deskripsi_prestasi' => $request->deskripsi_prestasi,
            'gambar_prestasi' => $gambar_prestasiPath,
            'on_delete' => false,
        ]);

        // redirect to index with success message
        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        // get prestasi by id
        $prestasi = Prestasi::findOrFail($id);
        // return view with page_title and data
        return view(
            'backend.pages.prestasi.edit',
            [
                'page_title' => 'Edit Prestasi',
                'data' => $prestasi,
            ]
        );
    }

    public function update(Request $request, $id)
    {
        // validate request
        $request->validate([
            'judul_prestasi' => 'required|string|max:255',
            'deskripsi_prestasi' => 'required|string',
            'gambar_prestasi' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // get prestasi by id
        $prestasi = Prestasi::findOrFail($id);

        // check if request has gambar_prestasi
        if ($request->hasFile('gambar_prestasi')) {

            $oldImagePath = str_replace('/storage', '', $prestasi->gambar_prestasi);
            Storage::disk('public')->delete($oldImagePath);
            // get gambar_prestasi from request
            $gambar_prestasi = $request->file('gambar_prestasi');
            $gambar_prestasiName = $this->generateImageName($request->judul_prestasi, $gambar_prestasi->getClientOriginalExtension());
            $gambar_prestasiPath = $this->saveImageToStorage($gambar_prestasi, $gambar_prestasiName);
        } else {
            // if request has no gambar_prestasi, use the old gambar_prestasi
            $gambar_prestasiPath = $prestasi->gambar_prestasi;
        }

        // update prestasi
        $prestasi->update([
            'judul_prestasi' => $request->judul_prestasi,
            'deskripsi_prestasi' => $request->deskripsi_prestasi,
            'gambar_prestasi' => $gambar_prestasiPath,
        ]);

        // redirect to index with success message
        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil diubah');
    }

    public function destroy($id)
    {
        // get prestasi by id
        $prestasi = Prestasi::findOrFail($id);
        // update on_delete to true
        $prestasi->update(['on_delete' => true]);
        // redirect to index with success message
        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil dihapus');
    }

    private function generateImageName($title, $extension)
    {
        return Str::slug($title) . '-' . time() . '-' . Str::random(3) . '.' . $extension;
    }

    private function saveImageToStorage($image, $imageName)
    {
        $path = 'uploads/prestasi/' . $imageName;

        // Store the image
        Storage::disk('public')->put($path, file_get_contents($image));

        // Return the public path
        return Storage::url($path);
    }
}
