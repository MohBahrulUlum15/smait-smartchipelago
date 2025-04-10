<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use App\Models\VisiMisiTujuanMotto;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index()
    {
        $motto = VisiMisiTujuanMotto::where('tipe', 'motto')->where('on_delete', 0)->first();
        $fasilitas = Fasilitas::where('on_delete', 0)->get();
        return view('frontend.pages.fasilitas.index', [
            'pageTitle' => 'Fasilitas',
            'motto' => $motto,
            'fasilitas' => $fasilitas,
        ]);
    }

    public function show($id)
    {
        $motto = VisiMisiTujuanMotto::where('tipe', 'motto')->where('on_delete', 0)->first();
        $fasilitas = Fasilitas::where('on_delete', 0)->find($id);
        // $komentar = KomentarBerita::where('news_id', $id)->where('on_delete', 0)->get();

        $semuaFasilitas = Fasilitas::where('on_delete', 0)->get();

        // Decode JSON data in the 'supporting_images' column
        // $supportingImages = $fasilitas->supporting_images ? json_decode($fasilitas->supporting_images, true) : [];

        return view('frontend.pages.fasilitas.detail', [
            'pageTitle' => 'Detail Berita',
            'motto' => $motto,
            'fasilitas' => $fasilitas,
            // 'komentar' => $komentar,
            'semuaFasilitas' => $semuaFasilitas,
            // 'supportingImages' => $supportingImages,
        ]);
    }
}
