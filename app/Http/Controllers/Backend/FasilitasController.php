<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    // create function index, create, store, edit, update, destroy
    public function index()
    {
        // get all data from fasilitas table where on_delete is false
        $fasilitas = Fasilitas::where('on_delete', false)->get();
        // return view with page_title and data
        return view(
            'backend.pages.fasilitas.index',
            [
                'page_title' => 'Fasilitas',
                'data' => $fasilitas,
            ]
        );
    }

    public function create()
    {
        // return view with page_title
        return view(
            'backend.pages.fasilitas.create',
            [
                'page_title' => 'Tambah Fasilitas',
            ]
        );
    }

    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // get foto from request
        $foto = $request->file('foto');
        // generate foto name
        $fotoName = $this->generateImageName($request->nama_fasilitas, $foto->getClientOriginalExtension());
        // save foto to storage
        $fotoPath = $this->saveImageToStorage($foto, $fotoName);

        // create new fasilitas
        Fasilitas::create([
            'nama_fasilitas' => $request->nama_fasilitas,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
            'on_delete' => false,
        ]);

        // redirect to index with success message
        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan');
    }

    public function edit($id)
    {
        // get fasilitas by id
        $fasilitas = Fasilitas::findOrFail($id);
        // return view with page_title and data
        return view(
            'backend.pages.fasilitas.edit',
            [
                'page_title' => 'Edit Fasilitas',
                'data' => $fasilitas,
            ]
        );
    }

    public function update(Request $request, $id)
    {
        // validate request
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // get fasilitas by id
        $fasilitas = Fasilitas::findOrFail($id);

        // check if request has foto
        if ($request->hasFile('foto')) {
            // get foto from request
            $foto = $request->file('foto');
            // generate foto name
            $fotoName = $this->generateImageName($request->nama_fasilitas, $foto->getClientOriginalExtension());
            // save foto to storage
            $fotoPath = $this->saveImageToStorage($foto, $fotoName);
        } else {
            // if request has no foto, use the old foto
            $fotoPath = $fasilitas->foto;
        }

        // update fasilitas
        $fasilitas->update([
            'nama_fasilitas' => $request->nama_fasilitas,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
        ]);

        // redirect to index with success message
        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil diubah');
    }

    public function destroy($id)
    {
        // get fasilitas by id
        $fasilitas = Fasilitas::findOrFail($id);
        // update on_delete to true
        $fasilitas->update(['on_delete' => true]);
        // redirect to index with success message
        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil dihapus');
    }

    private function generateImageName($title, $extension)
    {
        return Str::slug($title) . '-' . time() . '-' . Str::random(3) . '.' . $extension;
    }

    private function saveImageToStorage($image, $imageName)
    {
        $path = 'uploads/program-unggulan/' . $imageName;

        // Store the image
        Storage::disk('public')->put($path, file_get_contents($image));

        // Return the public path
        return Storage::url($path);
    }
}
