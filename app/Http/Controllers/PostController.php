<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $posts = Post::with('gallery')
                ->where(function ($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('meta_description', 'like', '%' . $search . '%');
                })
                ->latest()
                ->paginate(10)
                ->withQueryString();
        } else {
            $page = Paginator::resolveCurrentPage() ?: 1;
            $posts = Cache::remember("posts_index_page_{$page}", 300, fn() => Post::with('gallery')->latest()->paginate(10));
        }

        return view('blog.index', compact('posts', 'search'));
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
