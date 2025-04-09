<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Beranda;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BerandaController extends Controller
{
    public function index()
    {
        $beranda = Beranda::first();
        return view(
            'backend.pages.beranda.index',
            [
                'pageTitle' => 'Beranda',
                'beranda' => $beranda
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $beranda = Beranda::findOrFail($id);

        // dd($beranda, $request->all());

        $request->validate([
            'slider_img_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'slider_img_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'slider_img_3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi_slider_1' => 'required|string',
            'deskripsi_slider_2' => 'required|string',
            'deskripsi_slider_3' => 'required|string',
            'link_slider_1' => 'nullable|string',
            'link_slider_2' => 'nullable|string',
            'link_slider_3' => 'nullable|string',
        ]);

        // img slider 1
        if ($request->hasFile('slider_img_1')) {
            // Hapus gambar lama
            Storage::disk('public')->delete('uploads/general-images/' . basename($beranda->slider_img_1));

            // Simpan gambar baru
            $sliderImg1 = $request->file('slider_img_1');
            $sliderImg1Name = $this->generateImageName('slide-1', $sliderImg1->getClientOriginalExtension());
            $sliderImg1Path = $this->saveImageToStorage($sliderImg1, $sliderImg1Name);
            $beranda->slider_img_1 = $sliderImg1Path;
        } else {
            $sliderImg1Path = $beranda->slider_img_1;
        }

        // img slider 2
        if ($request->hasFile('slider_img_2')) {
            // Hapus gambar lama
            Storage::disk('public')->delete('uploads/general-images/' . basename($beranda->slider_img_2));

            // Simpan gambar baru
            $sliderImg2 = $request->file('slider_img_2');
            $sliderImg2Name = $this->generateImageName('slide-2', $sliderImg2->getClientOriginalExtension());
            $sliderImg2Path = $this->saveImageToStorage($sliderImg2, $sliderImg2Name);
            $beranda->slider_img_2 = $sliderImg2Path;
        } else {
            $sliderImg2Path = $beranda->slider_img_2;
        }

        // img slider 3
        if ($request->hasFile('slider_img_3')) {
            // Hapus gambar lama
            Storage::disk('public')->delete('uploads/general-images/' . basename($beranda->slider_img_3));

            // Simpan gambar baru
            $sliderImg3 = $request->file('slider_img_3');
            $sliderImg3Name = $this->generateImageName('slide-3', $sliderImg3->getClientOriginalExtension());
            $sliderImg3Path = $this->saveImageToStorage($sliderImg3, $sliderImg3Name);
            $beranda->slider_img_3 = $sliderImg3Path;
        } else {
            $sliderImg3Path = $beranda->slider_img_3;
        }

        $beranda->update([
            'slider_img_1' => $sliderImg1Path,
            'slider_img_2' => $sliderImg2Path,
            'slider_img_3' => $sliderImg3Path,
            'deskripsi_slider_1' => $request->deskripsi_slider_1,
            'deskripsi_slider_2' => $request->deskripsi_slider_2,
            'deskripsi_slider_3' => $request->deskripsi_slider_3,
            'link_slider_1' => $request->link_slider_1,
            'link_slider_2' => $request->link_slider_2,
            'link_slider_3' => $request->link_slider_3,
        ]);

        return redirect()->route('beranda.index')->with('success', 'Updated successfully.');
    }

    private function generateImageName($title, $extension)
    {
        return Str::slug($title) . '-' . time() . '-' . Str::random(3) . '.' . $extension;
    }

    private function saveImageToStorage($image, $imageName)
    {
        $path = 'uploads/general-images/' . $imageName;

        // Store the image
        Storage::disk('public')->put($path, file_get_contents($image));

        // Return the public path
        return Storage::url($path);
    }
}
