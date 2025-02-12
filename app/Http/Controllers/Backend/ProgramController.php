<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::where('on_delete', false)->get();
        return view(
            'backend.pages.program.index',
            [
                'page_title' => 'Program Unggulan',
                'data' => $programs,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'backend.pages.program.create',
            [
                'page_title' => 'Tambah Program Unggulan',
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $foto = $request->file('foto');
        $fotoName = $this->generateImageName($request->nama_program, $foto->getClientOriginalExtension());
        $fotoPath = $this->saveImageToStorage($foto, $fotoName);

        Program::create([
            'nama_program' => $request->nama_program,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
            'on_delete' => false,
        ]);

        return redirect()->route('program.index')->with('success', 'Program Unggulan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $program = Program::find($id);
        return view(
            'backend.pages.program.edit',
            [
                'page_title' => 'Edit Program Unggulan',
                'data' => $program,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        $request->validate([
            'nama_program' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $oldImagePath = str_replace('/storage', '', $program->foto);
            Storage::disk('public')->delete($oldImagePath);

            $foto = $request->file('foto');
            $fotoName = $this->generateImageName($request->nama_program, $foto->getClientOriginalExtension());
            $fotoPath = $this->saveImageToStorage($foto, $fotoName);
        } else {
            $fotoPath = $program->foto;
        }

        $program->update([
            'nama_program' => $request->nama_program,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('program.index')->with('success', 'Program Unggulan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->on_delete = true;
        $program->save();

        return redirect()->route('program.index')->with('success', 'Program Unggulan berhasil dihapus');
    }

    private function generateImageName($title, $extension)
    {
        return Str::slug($title) . '-' . time() . '-' . Str::random(3) . '.' . $extension;
    }

    private function saveImageToStorage($image, $imageName)
    {
        $path = 'uploads/program/' . $imageName;

        // Store the image
        Storage::disk('public')->put($path, file_get_contents($image));

        // Return the public path
        return Storage::url($path);
    }
}
