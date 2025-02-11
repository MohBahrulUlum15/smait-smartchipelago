<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $news = News::where('on_delete', false)->get();
        // dd($news);

        return view('backend.pages.news.index', [
            'pageTitle' => 'News',
            'news' => $news,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, News $news)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required',
            'author' => 'required|string|max:255',
            'tags' => 'nullable|array',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'supporting_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        $featuredImage = $request->file('featured_image');
        $featuredImageName = $this->generateImageName($request->title, $featuredImage->getClientOriginalExtension());
        $featuredImagePath = $this->saveImageToStorage($featuredImage, $featuredImageName);

        $supportingImagesPaths = [];
        if ($request->hasFile('supporting_images')) {
            foreach ($request->file('supporting_images') as $supportingImage) {
                $supportingImageName = $this->generateImageName($request->title, $supportingImage->getClientOriginalExtension());
                $supportingImagePath = $this->saveImageToStorage($supportingImage, $supportingImageName);
                $supportingImagesPaths[] = $supportingImagePath;
            }
        }

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'type' => $request->type,
            'author' => $request->author,
            'tags' => json_encode($request->tags),
            'featured_image' => $featuredImagePath,
            'supporting_images' => json_encode($supportingImagesPaths),
        ]);

        return redirect()->route('news-backend.index')->with('success', 'News created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        $news->tags = json_decode($news->tags, true);
        $news->supporting_images = json_decode($news->supporting_images, true);

        // dd($news);
        return view('backend.pages.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());

        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required',
            'author' => 'required|string|max:255',
            'tags' => 'nullable|array',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'supporting_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Update gambar utama (jika ada)
        if ($request->hasFile('featured_image')) {
            // Hapus gambar lama
            Storage::disk('public')->delete('uploads/news_images/' . basename($news->featured_image));

            // Simpan gambar baru
            $featuredImage = $request->file('featured_image');
            $featuredImageName = $this->generateImageName($request->title, $featuredImage->getClientOriginalExtension());
            $featuredImagePath = $this->saveImageToStorage($featuredImage, $featuredImageName);
            $news->featured_image = $featuredImagePath;
        } else {
            $featuredImagePath = $news->featured_image;
        }

        // Update gambar pendukung (jika ada)
        $supportingImagesPaths = json_decode($news->supporting_images, true) ?? [];
        if ($request->hasFile('supporting_images')) {
            foreach ($request->file('supporting_images') as $index => $image) {
                // Hapus gambar lama jika ada gambar baru yang diunggah di posisi yang sama
                if (isset($supportingImagesPaths[$index])) {
                    $oldImagePath = str_replace('/storage', '', $supportingImagesPaths[$index]);
                    Storage::disk('public')->delete($oldImagePath);
                }

                // Simpan gambar baru
                $supportingImageName = $this->generateImageName($request->title, $image->getClientOriginalExtension());
                $supportingImagesPaths[$index] = $this->saveImageToStorage($image, $supportingImageName);
            }
        }

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'type' => $request->type,
            'author' => $request->author,
            'tags' => json_encode($request->tags),
            'featured_image' => $featuredImagePath,
            'supporting_images' => json_encode($supportingImagesPaths),
        ]);

        return redirect()->route('news-backend.index')->with('success', 'News updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        $news->update([
            'on_delete' => true,
        ]);

        return redirect()->route('news-backend.index')->with('success', 'News deleted successfully.');
    }

    private function generateImageName($title, $extension)
    {
        return Str::slug($title) . '-' . time() . '-' . Str::random(3) . '.' . $extension;
    }

    private function saveImageToStorage($image, $imageName)
    {
        $path = 'uploads/news_images/' . $imageName;

        // Store the image
        Storage::disk('public')->put($path, file_get_contents($image));

        // Return the public path
        return Storage::url($path);
    }
}
