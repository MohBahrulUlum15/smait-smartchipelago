<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jumlahPengajar = \App\Models\Pengajar::where('on_delete', 0)->count();
        $jumlahProgram = \App\Models\Program::where('on_delete', 0)->count();
        $jumlahFasilitas = \App\Models\Fasilitas::where('on_delete', 0)->count();
        $jumlahBerita = \App\Models\News::where('on_delete', 0)->count();
        $jumlahArtikel = \App\Models\Artikel::where('on_delete', 0)->count();
        return view(
            'backend.pages.dashboard.index',
            [
                'title' => 'Dashboard',
                'jumlahPengajar' => $jumlahPengajar,
                'jumlahProgram' => $jumlahProgram,
                'jumlahFasilitas' => $jumlahFasilitas,
                'jumlahBerita' => $jumlahBerita,
                'jumlahArtikel' => $jumlahArtikel,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
