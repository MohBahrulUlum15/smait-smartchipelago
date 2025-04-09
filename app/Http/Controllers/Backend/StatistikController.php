<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pengajar;
use App\Models\Statistik;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public function index()
    {
        $jumlahPengajar = Pengajar::where('on_delete', 0)->count();
        $statistik = Statistik::first();
        return view('backend.pages.statistik.index', [
            'pageTitle' => 'Statistik',
            'statistik' => $statistik,
            'jumlah_pengajar' => $jumlahPengajar,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'jumlah_siswa' => 'required|integer',
            'jumlah_lulusan' => 'required|integer',
        ]);

        $statistik = Statistik::first();
        $statistik->update($request->all());

        return redirect()->route('statistik.index')->with('success', 'Statistik updated successfully.');
    }
}
