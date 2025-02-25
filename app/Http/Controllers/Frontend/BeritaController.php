<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\KomentarBerita;
use App\Models\News;
use App\Models\VisiMisiTujuanMotto;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $motto = VisiMisiTujuanMotto::where('tipe', 'motto')->where('on_delete', 0)->first();
        $berita = News::where('on_delete', 0)->get();
        return view('frontend.pages.berita.index', [
            'pageTitle' => 'Berita',
            'motto' => $motto,
            'berita' => $berita,
        ]);
    }

    public function show($id)
    {
        $motto = VisiMisiTujuanMotto::where('tipe', 'motto')->where('on_delete', 0)->first();
        $berita = News::where('on_delete', 0)->find($id);
        $komentar = KomentarBerita::where('news_id', $id)->where('on_delete', 0)->get();
        return view('frontend.pages.berita.detail', [
            'pageTitle' => 'Detail Berita',
            'motto' => $motto,
            'berita' => $berita,
            'komentar' => $komentar,
        ]);
    }

    public function postKomentar(Request $request, $id)
    {
        // dd($request->all());

        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'komentar' => 'required',
        ]);

        $komentar = new KomentarBerita();
        $komentar->nama = $request->nama;
        $komentar->email = $request->email;
        $komentar->komentar = $request->komentar;
        $komentar->news_id = $id;
        $komentar->save();

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }
}
