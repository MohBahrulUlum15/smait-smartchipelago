<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use App\Models\VisiMisiTujuanMotto;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        $motto = VisiMisiTujuanMotto::where('tipe', 'motto')->where('on_delete', 0)->first();
        $prestasi = Prestasi::where('on_delete', 0)->get();
        return view('frontend.pages.prestasi.index', [
            'pageTitle' => 'Prestasi',
            'motto' => $motto,
            'prestasi' => $prestasi,
        ]);
    }
}
