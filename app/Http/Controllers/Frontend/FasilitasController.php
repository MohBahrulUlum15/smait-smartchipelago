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
}
