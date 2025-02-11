<?php

namespace App\Http\Controllers\Backend;

use App\Models\Sambutan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SambutanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sambutan = Sambutan::first();
        return view('backend.pages.sambutan.index', compact('sambutan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sambutan $sambutan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sambutan $sambutan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());

        $sambutan = Sambutan::find($id);

        // Validasi input
        $request->validate([
            'nama_kepala_sekolah' => 'required|string|max:255',
            'sambutan_kepala_sekolah' => 'required|string',
            'foto_kepala_sekolah' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Update gambar utama (jika ada)
        if ($request->hasFile('foto_kepala_sekolah')) {
            // Hapus gambar lama
            $oldImagePath = str_replace('/storage', '', $sambutan->foto_kepala_sekolah);
            Storage::disk('public')->delete($oldImagePath);

            // Simpan gambar baru
            $fotoKepalaSekolah = $request->file('foto_kepala_sekolah');
            $fotoKepalaSekolahName = $this->generateImageName($request->nama_kepala_sekolah, $fotoKepalaSekolah->getClientOriginalExtension());
            $fotoKepalaSekolahPath = $this->saveImageToStorage($fotoKepalaSekolah, $fotoKepalaSekolahName);
            $sambutan->foto_kepala_sekolah = $fotoKepalaSekolahPath;
        } else {
            $fotoKepalaSekolahPath = $request->foto_kepala_sekolah;
        }

        $sambutan->update([
            'nama_kepala_sekolah' => $request->nama_kepala_sekolah,
            'sambutan_kepala_sekolah' => $request->sambutan_kepala_sekolah,
            'foto_kepala_sekolah' => $fotoKepalaSekolahPath,
        ]);

        return redirect()->route('sambutan.index')->with('success', 'Data sambutan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sambutan $sambutan)
    {
        //
    }

    private function generateImageName($title, $extension)
    {
        return Str::slug($title) . '-' . time() . '-' . Str::random(3) . '.' . $extension;
    }

    private function saveImageToStorage($image, $imageName)
    {
        $path = 'uploads/general-images/' . $imageName;

        // Store the image
        Storage::disk('public')->put($path, file_get_contents($image));

        // Return the public path
        return Storage::url($path);
    }
}
