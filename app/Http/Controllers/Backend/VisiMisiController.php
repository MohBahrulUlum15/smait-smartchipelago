<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\VisiMisiTujuanMotto;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index()
    {
        $visi = VisiMisiTujuanMotto::where('tipe', 'visi')->get();
        $misi = VisiMisiTujuanMotto::where('tipe', 'misi')->where('on_delete', 0)->get();

        // dd($visi, $misi);
        return view(
            'backend.pages.visi-misi.index',
            [
                'pageTitle' => 'Visi & Misi',
                'visi' => $visi,
                'misi' => $misi,
            ]
        );
    }

    public function updateVisi(Request $request, $id)
    {
        // dd($request->all(), $id);

        $request->validate([
            'deskripsi' => 'required'
        ]);

        VisiMisiTujuanMotto::find($id)->update([
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('visi-misi.index')->with('success', 'Visi berhasil diubah');
    }

    public function storeMisi(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required'
        ]);

        VisiMisiTujuanMotto::create([
            'deskripsi' => $request->deskripsi,
            'tipe' => 'misi'
        ]);

        return redirect()->route('visi-misi.index')->with('success', 'Misi berhasil ditambahkan');
    }

    public function updateMisi(Request $request, $id)
    {
        $request->validate([
            'deskripsi' => 'required'
        ]);

        VisiMisiTujuanMotto::find($id)->update([
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('visi-misi.index')->with('success', 'Misi berhasil diubah');
    }

    public function destroyMisi($id)
    {
        VisiMisiTujuanMotto::find($id)->update([
            'on_delete' => 1
        ]);

        return redirect()->route('visi-misi.index')->with('success', 'Misi berhasil dihapus');
    }
}
