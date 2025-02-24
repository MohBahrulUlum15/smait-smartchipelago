<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Beranda;
use App\Models\Sambutan;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $beranda = Beranda::first();
        $sambutan = Sambutan::first();
        return view('frontend.pages.beranda', [
            'pageTitle' => 'Beranda',
            'beranda' => $beranda,
            'sambutan' => $sambutan,
        ]);
    }
}
