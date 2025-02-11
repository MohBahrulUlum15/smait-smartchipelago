<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\VisiMisiTujuanMotto;
use Illuminate\Http\Request;

class MottoTujuanController extends Controller
{
    public function index()
    {
        $motto = VisiMisiTujuanMotto::where('tipe', 'motto')->get();
        $tujuan = VisiMisiTujuanMotto::where('tipe', 'tujuan')->where('on_delete', 0)->get();

        // dd($motto, $tujuan);

        return view('backend.pages.motto-tujuan.index', [
            'pageTitle' => 'Motto & Tujuan',
            'motto' => $motto,
            'tujuan' => $tujuan,
        ]);
    }

    public function updateMotto(Request $request, $id)
    {
        // dd($request->all(), $id);

        $request->validate([
            'deskripsi' => 'required'
        ]);

        VisiMisiTujuanMotto::find($id)->update([
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('motto-tujuan.index')->with('success', 'Motto berhasil diubah');
    }

    public function storeTujuan(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required'
        ]);

        VisiMisiTujuanMotto::create([
            'deskripsi' => $request->deskripsi,
            'tipe' => 'tujuan'
        ]);

        return redirect()->route('motto-tujuan.index')->with('success', 'Tujuan berhasil ditambahkan');
    }

    public function updateTujuan(Request $request, $id)
    {
        $request->validate([
            'deskripsi' => 'required'
        ]);

        VisiMisiTujuanMotto::find($id)->update([
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('motto-tujuan.index')->with('success', 'Tujuan berhasil diubah');
    }

    public function destroyTujuan($id)
    {
        VisiMisiTujuanMotto::find($id)->update([
            'on_delete' => 1
        ]);

        return redirect()->route('motto-tujuan.index')->with('success', 'Tujuan berhasil dihapus');
    }
}
