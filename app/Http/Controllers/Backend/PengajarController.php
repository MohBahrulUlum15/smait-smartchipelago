<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajars = Pengajar::where('on_delete', false)->get();
        return view('backend.pages.pengajar.index', [
            'pageTitle' => 'Pengajar',
            'pengajar' => $pengajars,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.pengajar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $foto = $request->file('foto');
        $fotoName = $this->generateImageName($request->nama, $foto->getClientOriginalExtension());
        $fotoPath = $this->saveImageToStorage($foto, $fotoName);

        Pengajar::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $fotoPath,
            'nomor_hp' => $request->nomor_hp,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'quote' => $request->quote,
            'on_delete' => false,
        ]);

        return redirect()->route('pengajar.index')->with('success', 'Pengajar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengajar = Pengajar::findOrFail($id);
        return view('backend.pages.pengajar.edit', [
            'pageTitle' => 'Edit Pengajar',
            'pengajar' => $pengajar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pengajar = Pengajar::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $oldImagePath = str_replace('/storage', '', $pengajar->foto);
            Storage::disk('public')->delete($oldImagePath);

            $foto = $request->file('foto');
            $fotoName = $this->generateImageName($request->nama, $foto->getClientOriginalExtension());
            $fotoPath = $this->saveImageToStorage($foto, $fotoName);
        } else {
            $fotoPath = $pengajar->foto;
        }

        $pengajar->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $fotoPath,
            'nomor_hp' => $request->nomor_hp,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'quote' => $request->quote,
        ]);

        return redirect()->route('pengajar.index')->with('success', 'Pengajar berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengajar = Pengajar::findOrFail($id);
        $pengajar->update(['on_delete' => true]);

        return redirect()->route('pengajar.index')->with('success', 'Pengajar berhasil dihapus');
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
