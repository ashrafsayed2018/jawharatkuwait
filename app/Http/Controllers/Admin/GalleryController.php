<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $images = Gallery::latest()->paginate(20);
        return view('admin.gallery.index', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5120'], // 5MB max
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('uploads/gallery', 'public');
                $this->compressImage(storage_path('app/public/'.$path));
                
                Gallery::create([
                    'image_path' => '/storage/' . $path,
                    'title' => pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),
                ]);
            }
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Images uploaded successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        // Remove file from storage
        $path = str_replace('/storage/', '', $gallery->image_path);
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Image deleted successfully.');
    }

    public function api()
    {
        return response()->json(Gallery::latest()->paginate(20));
    }

    private function compressImage(string $absolutePath): void
    {
        if (!is_file($absolutePath)) return;
        $info = pathinfo($absolutePath);
        $ext = strtolower($info['extension'] ?? '');
        if ($ext === 'jpg' || $ext === 'jpeg') {
            $img = imagecreatefromjpeg($absolutePath);
            if ($img) {
                imagejpeg($img, $absolutePath, 80);
                imagedestroy($img);
            }
        } elseif ($ext === 'png') {
            $img = imagecreatefrompng($absolutePath);
            if ($img) {
                imagepng($img, $absolutePath, 7);
                imagedestroy($img);
            }
        }
    }
}
