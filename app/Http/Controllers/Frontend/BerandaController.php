<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Beranda;
use App\Models\Fasilitas;
use App\Models\News;
use App\Models\Pengajar;
use App\Models\Program;
use App\Models\Sambutan;
use App\Models\Statistik;
use App\Models\VisiMisiTujuanMotto;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $beranda = Beranda::first();

        $visi = VisiMisiTujuanMotto::where('tipe', 'visi')->where('on_delete', 0)->first();
        $misi = VisiMisiTujuanMotto::where('tipe', 'misi')->where('on_delete', 0)->get();
        $motto = VisiMisiTujuanMotto::where('tipe', 'motto')->where('on_delete', 0)->first();
        $tujuan = VisiMisiTujuanMotto::where('tipe', 'tujuan')->where('on_delete', 0)->get();

        $sambutan = Sambutan::first();

        $program = Program::where('on_delete', 0)->orderBy('id')->limit(4)->get();
        $fasilitas = Fasilitas::where('on_delete', 0)->orderBy('id')->limit(4)->get();

        $statistik = Statistik::first();
        $jumlahPengajar = Pengajar::where('on_delete', 0)->count();

        $beritaTerbaru = News::latest()->limit(3)->get();

        return view('frontend.pages.beranda', [
            'pageTitle' => 'Beranda',
            'beranda' => $beranda,
            'visi' => $visi,
            'misi' => $misi,
            'motto' => $motto,
            'tujuan' => $tujuan,
            'sambutan' => $sambutan,
            'program' => $program,
            'fasilitas' => $fasilitas,
            'statistik' => $statistik,
            'jumlah_pengajar' => $jumlahPengajar,
            'beritaTerbaru' => $beritaTerbaru
        ]);
    }
}
