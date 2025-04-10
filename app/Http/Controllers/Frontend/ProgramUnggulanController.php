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

    public function show($id)
    {
        $motto = VisiMisiTujuanMotto::where('tipe', 'motto')->where('on_delete', 0)->first();
        $program = Program::where('on_delete', 0)->find($id);
        // $komentar = KomentarBerita::where('news_id', $id)->where('on_delete', 0)->get();

        $semuaProgram = Program::where('on_delete', 0)->get();

        // Decode JSON data in the 'supporting_images' column
        // $supportingImages = $program->supporting_images ? json_decode($program->supporting_images, true) : [];

        return view('frontend.pages.program-unggulan.detail', [
            'pageTitle' => 'Detail Berita',
            'motto' => $motto,
            'program' => $program,
            // 'komentar' => $komentar,
            'semuaProgram' => $semuaProgram,
            // 'supportingImages' => $supportingImages,
        ]);
    }
}
