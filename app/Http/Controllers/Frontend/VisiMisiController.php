<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Sambutan;
use App\Models\VisiMisiTujuanMotto;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index()
    {
        $visi = VisiMisiTujuanMotto::where('tipe', 'visi')->where('on_delete', 0)->first();
        $misi = VisiMisiTujuanMotto::where('tipe', 'misi')->where('on_delete', 0)->get();
        $motto = VisiMisiTujuanMotto::where('tipe', 'motto')->where('on_delete', 0)->first();
        $tujuan = VisiMisiTujuanMotto::where('tipe', 'tujuan')->where('on_delete', 0)->get();
        $sambutan = Sambutan::first();
        return view('frontend.pages.profil-sekolah.visi-misi.index', [
            'pageTitle' => 'Visi & Misi',
            'visi' => $visi,
            'misi' => $misi,
            'motto' => $motto,
            'tujuan' => $tujuan,
            'sambutan' => $sambutan
        ]);
    }
}
