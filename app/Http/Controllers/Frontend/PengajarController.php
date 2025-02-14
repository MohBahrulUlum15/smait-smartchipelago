<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pengajar;
use App\Models\VisiMisiTujuanMotto;
use Illuminate\Http\Request;

class PengajarController extends Controller
{
    public function index()
    {
        $motto = VisiMisiTujuanMotto::where('tipe', 'motto')->where('on_delete', 0)->first();
        $pengajars = Pengajar::where('on_delete', 0)->get();
        return view(
            'frontend.pages.profil-sekolah.pengajar.index',
            [
                'pageTitle' => 'Pengajar',
                'motto' => $motto,
                'pengajars' => $pengajars
            ]
        );
    }
}
