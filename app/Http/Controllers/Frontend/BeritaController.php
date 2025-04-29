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

        $beritaTerbaru = News::where('on_delete', 0)->orderBy('created_at', 'desc')->limit(5)->get();

        // Decode JSON data in the 'supporting_images' column
        $supportingImages = $berita->supporting_images ? json_decode($berita->supporting_images, true) : [];

        return view('frontend.pages.berita.detail', [
            'pageTitle' => 'Detail Berita',
            'motto' => $motto,
            'berita' => $berita,
            'komentar' => $komentar,
            'beritaTerbaru' => $beritaTerbaru,
            'supportingImages' => $supportingImages,
        ]);
    }

    public function postKomentar(Request $request, $id)
    {
        // dd($request->all());

        $request->validate([
            'nama' => 'required',
            'komentar' => 'required',
        ]);

        $komentar = new KomentarBerita();
        $komentar->nama = $request->nama;
        $komentar->komentar = $request->komentar;
        $komentar->news_id = $id;
        $komentar->save();

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }
}
