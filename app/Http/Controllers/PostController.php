<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index()
    {
        $posts = Cache::remember('posts_index', 300, fn() => Post::with('gallery')->latest()->paginate(10));
        return view('blog.index', compact('posts'));
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        // Increment views if not already viewed in this session
        $sessionKey = 'viewed_tag_' . $tag->id;
        if (!session()->has($sessionKey)) {
            $tag->increment('views');
            session()->put($sessionKey, true);
        }

        $posts = $tag->posts()->with('gallery')->latest()->paginate(12);
        
        return view('tags.show', compact('tag', 'posts'));
    }

    public function show($slug)
    {
        $post = Post::with('gallery', 'service')->where('slug', $slug)->firstOrFail();
        
        // Increment views if not already viewed in this session
        $sessionKey = 'viewed_post_' . $post->id;
        if (!session()->has($sessionKey)) {
            $post->increment('views');
            session()->put($sessionKey, true);
        }

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
