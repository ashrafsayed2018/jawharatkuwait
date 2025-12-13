<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image'],
            'tags' => ['nullable', 'string'],
            'published_at' => ['nullable', 'date'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:255'],
        ]);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/posts', 'public');
            $this->compressImage(storage_path('app/public/'.$path));
            $data['image'] = '/storage/' . $path;
        }
        Post::create($data);
        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image'],
            'tags' => ['nullable', 'string'],
            'published_at' => ['nullable', 'date'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:255'],
        ]);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/posts', 'public');
            $this->compressImage(storage_path('app/public/'.$path));
            $data['image'] = '/storage/' . $path;
        }
        $post->update($data);
        return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
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
