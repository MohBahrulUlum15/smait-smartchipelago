<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
}
