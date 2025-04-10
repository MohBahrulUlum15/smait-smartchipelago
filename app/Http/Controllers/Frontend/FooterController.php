<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Backend\MottoTujuanController;
use App\Http\Controllers\Controller;
use App\Models\DetailInformation;
use App\Models\VisiMisiTujuanMotto;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $dataFooter = DetailInformation::first();
        $mottoInFooter = VisiMisiTujuanMotto::where('tipe', 'motto')->first();

        return view('frontend.layouts.app', compact('dataFooter', 'mottoInFooter'));
    }
}
