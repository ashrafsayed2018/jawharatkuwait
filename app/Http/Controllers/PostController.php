<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index()
    {
        $posts = Cache::remember('posts_index', 300, fn() => Post::with('gallery')->latest()->paginate(10));
        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::with('gallery', 'service')->where('slug', $slug)->firstOrFail();
        
        $relatedPosts = Post::where('service_id', $post->service_id)
            ->where('id', '!=', $post->id)
            ->latest()
            ->get();

        return view('blog.show', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
            'metaTitle' => $post->meta_title,
            'metaDescription' => $post->meta_description,
        ]);
    }
}
