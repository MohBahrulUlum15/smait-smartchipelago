<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    // create function index, create, store, edit, update, destroy
    public function index()
    {
        // get all data from kegiatan table where on_delete is false
        $kegiatan = Kegiatan::where('on_delete', false)->get();
        // return view with page_title and data
        return view(
            'backend.pages.kegiatan.index',
            [
                'pageTitle' => 'Kegiatan',
                'data' => $kegiatan,
            ]
        );
    }

    public function create()
    {
        // return view with page_title
        return view(
            'backend.pages.kegiatan.create',
            [
                'pageTitle' => 'Tambah Kegiatan',
            ]
        );
    }

    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi_kegiatan' => 'required|string',
            'gambar_kegiatan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // get gambar_kegiatan from request
        $gambar_kegiatan = $request->file('gambar_kegiatan');
        // generate gambar_kegiatan name
        $gambar_kegiatanName = $this->generateImageName($request->nama_kegiatan, $gambar_kegiatan->getClientOriginalExtension());
        // save gambar_kegiatan to storage
        $gambar_kegiatanPath = $this->saveImageToStorage($gambar_kegiatan, $gambar_kegiatanName);

        // create new kegiatan
        Kegiatan::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'deskripsi_kegiatan' => $request->deskripsi_kegiatan,
            'gambar_kegiatan' => $gambar_kegiatanPath,
            'on_delete' => false,
        ]);

        // redirect to index with success message
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function edit($id)
    {
        // get kegiatan by id
        $kegiatan = Kegiatan::findOrFail($id);
        // return view with page_title and data
        return view(
            'backend.pages.kegiatan.edit',
            [
                'page_title' => 'Edit Kegiatan',
                'data' => $kegiatan,
            ]
        );
    }

    public function update(Request $request, $id)
    {
        // validate request
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi_kegiatan' => 'required|string',
            'gambar_kegiatan' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // get kegiatan by id
        $kegiatan = Kegiatan::findOrFail($id);

        // check if request has gambar_kegiatan
        if ($request->hasFile('gambar_kegiatan')) {
            // get gambar_kegiatan from request
            $gambar_kegiatan = $request->file('gambar_kegiatan');
            // generate gambar_kegiatan name
            $gambar_kegiatanName = $this->generateImageName($request->nama_kegiatan, $gambar_kegiatan->getClientOriginalExtension());
            // save gambar_kegiatan to storage
            $gambar_kegiatanPath = $this->saveImageToStorage($gambar_kegiatan, $gambar_kegiatanName);
        } else {
            // if request has no gambar_kegiatan, use the old gambar_kegiatan
            $gambar_kegiatanPath = $kegiatan->gambar_kegiatan;
        }

        // update kegiatan
        $kegiatan->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'deskripsi_kegiatan' => $request->deskripsi_kegiatan,
            'gambar_kegiatan' => $gambar_kegiatanPath,
        ]);

        // redirect to index with success message
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diubah');
    }

    public function destroy($id)
    {
        // get kegiatan by id
        $kegiatan = Kegiatan::findOrFail($id);
        // update on_delete to true
        $kegiatan->update(['on_delete' => true]);
        // redirect to index with success message
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus');
    }

    private function generateImageName($title, $extension)
    {
        return Str::slug($title) . '-' . time() . '-' . Str::random(3) . '.' . $extension;
    }

    private function saveImageToStorage($image, $imageName)
    {
        $path = 'uploads/kegiatan/' . $imageName;

        // Store the image
        Storage::disk('public')->put($path, file_get_contents($image));

        // Return the public path
        return Storage::url($path);
    }
}
