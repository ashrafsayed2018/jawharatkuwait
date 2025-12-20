<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(20);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'long_description' => ['nullable', 'string'],
            'image' => ['nullable', 'image'],
            'image_url' => ['nullable', 'string'], // Allow image_url from gallery
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
            'gallery_ids' => ['nullable', 'array'],
            'gallery_ids.*' => ['exists:galleries,id'],
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/services', 'public');
            $this->compressImage(storage_path('app/public/'.$path));
            $data['image'] = '/storage/' . $path;
        } elseif ($request->filled('image_url')) {
            $data['image'] = $request->input('image_url');
        }

        unset($data['image_url']); // Remove auxiliary field
        
        $galleryIds = $data['gallery_ids'] ?? [];
        unset($data['gallery_ids']);

        $service = Service::create($data);
        
        if (!empty($galleryIds)) {
            $service->galleries()->sync($galleryIds);
        }

        return redirect()->route('admin.services.index');
    }

    public function edit(Service $service)
    {
        $service->load('galleries');
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'long_description' => ['nullable', 'string'],
            'image' => ['nullable', 'image'],
            'image_url' => ['nullable', 'string'], // Allow image_url from gallery
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
            'gallery_ids' => ['nullable', 'array'],
            'gallery_ids.*' => ['exists:galleries,id'],
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/services', 'public');
            $this->compressImage(storage_path('app/public/'.$path));
            $data['image'] = '/storage/' . $path;
        } elseif ($request->filled('image_url')) {
            $data['image'] = $request->input('image_url');
        }

        unset($data['image_url']); // Remove auxiliary field
        
        $galleryIds = $data['gallery_ids'] ?? [];
        unset($data['gallery_ids']);

        $service->update($data);
        
        $service->galleries()->sync($galleryIds);

        return redirect()->route('admin.services.index');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index');
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
