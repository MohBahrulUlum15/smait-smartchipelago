<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\VisiMisiTujuanMotto;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $motto = VisiMisiTujuanMotto::where('tipe', 'motto')->where('on_delete', 0)->first();
        $kegiatan = Kegiatan::where('on_delete', 0)->get();
        return view('frontend.pages.kegiatan.index', [
            'pageTitle' => 'Kegiatan',
            'motto' => $motto,
            'kegiatan' => $kegiatan,
        ]);
    }
}
