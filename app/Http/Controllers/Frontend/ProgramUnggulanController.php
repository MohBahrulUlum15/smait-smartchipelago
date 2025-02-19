<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\VisiMisiTujuanMotto;
use Illuminate\Http\Request;

class ProgramUnggulanController extends Controller
{
    public function index()
    {
        $motto = VisiMisiTujuanMotto::where('tipe', 'motto')->where('on_delete', 0)->first();
        $programs = Program::where('on_delete', 0)->get();
        return view('frontend.pages.program-unggulan.index', [
            'pageTitle' => 'Program Unggulan',
            'motto' => $motto,
            'programs' => $programs,
        ]);
    }
}
