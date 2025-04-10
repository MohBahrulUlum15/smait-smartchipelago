<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\VisiMisiTujuanMotto;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $motto = VisiMisiTujuanMotto::where('tipe', 'motto')->where('on_delete', 0)->first();
        $artikel = Artikel::where('on_delete', 0)->get();
        return view('frontend.pages.artikel.index', [
            'pageTitle' => 'Artikel',
            'motto' => $motto,
            'artikel' => $artikel,
        ]);
    }

    public function show($id)
    {
        $motto = VisiMisiTujuanMotto::where('tipe', 'motto')->where('on_delete', 0)->first();
        $artikel = Artikel::where('on_delete', 0)->find($id);
        // $komentar = KomentarBerita::where('news_id', $id)->where('on_delete', 0)->get();

        $artikelTerbaru = Artikel::where('on_delete', 0)->orderBy('created_at', 'desc')->limit(5)->get();

        // Decode JSON data in the 'supporting_images' column
        // $supportingImages = $artikel->supporting_images ? json_decode($artikel->supporting_images, true) : [];

        return view('frontend.pages.artikel.detail', [
            'pageTitle' => 'Detail Berita',
            'motto' => $motto,
            'artikel' => $artikel,
            // 'komentar' => $komentar,
            'artikelTerbaru' => $artikelTerbaru,
            // 'supportingImages' => $supportingImages,
        ]);
    }
}
