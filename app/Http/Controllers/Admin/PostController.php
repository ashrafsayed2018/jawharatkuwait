<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Service;
use App\Models\Gallery;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with(['service', 'gallery'])->latest();
        
        if ($request->status === 'archived') {
            $query->onlyTrashed();
        }

        $posts = $query->paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $services = Service::all();
        $tags = Tag::all();
        $imageList = Gallery::latest()->get()->map(function($image) {
            return ['title' => $image->title ?? 'Image', 'value' => $image->image_url];
        });
        return view('admin.posts.create', compact('services', 'tags', 'imageList'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
            'service_id' => ['required', 'exists:services,id'],
            'gallery_id' => ['required', 'exists:galleries,id'],
            'published_at' => ['nullable', 'date'],
            'meta_title' => ['required', 'string', 'max:255'],
            'meta_description' => ['required', 'string', 'max:255'],
        ]);

        if ($request->filled('gallery_id')) {
            $gallery = Gallery::find($request->gallery_id);
            if ($gallery) {
                $data['image'] = $gallery->image_path;
            }
        }

        $post = Post::create($data);
        
        if ($request->has('tags')) {
            $post->relatedTags()->sync($request->tags);
            // Update JSON column for backward compatibility
            $post->tags = $post->relatedTags()->pluck('name')->toArray();
            $post->saveQuietly();
        }

        return redirect()->route('admin.posts.index')->with('success', 'تم إضافة المقال بنجاح');
    }

    public function edit(Post $post)
    {
        $services = Service::all();
        $tags = Tag::all();
        $post->load('relatedTags');
        $imageList = Gallery::latest()->get()->map(function($image) {
            return ['title' => $image->title ?? 'Image', 'value' => $image->image_url];
        });
        return view('admin.posts.edit', compact('post', 'services', 'tags', 'imageList'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
            'service_id' => ['required', 'exists:services,id'],
            'gallery_id' => ['required', 'exists:galleries,id'],
            'published_at' => ['nullable', 'date'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:255'],
        ]);

        if ($request->filled('gallery_id')) {
            $gallery = Gallery::find($request->gallery_id);
            if ($gallery) {
                $data['image'] = $gallery->image_path;
            }
        }

        $post->update($data);

        if ($request->has('tags')) {
            $post->relatedTags()->sync($request->tags);
            // Update JSON column for backward compatibility
            $post->tags = $post->relatedTags()->pluck('name')->toArray();
            $post->saveQuietly();
        }

        return redirect()->route('admin.posts.index')->with('success', 'تم تحديث المقال بنجاح');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'تم نقل المقال للأرشيف بنجاح');
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->route('admin.posts.index', ['status' => 'archived'])->with('success', 'تم استعادة المقال بنجاح');
    }

    public function forceDelete($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->relatedTags()->detach();
        $post->forceDelete();
        return redirect()->route('admin.posts.index', ['status' => 'archived'])->with('success', 'تم حذف المقال نهائياً');
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
