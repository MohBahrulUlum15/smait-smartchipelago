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
}
