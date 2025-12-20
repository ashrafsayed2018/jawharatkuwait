<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Service;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    public function index()
    {
        $services = Cache::remember('home_services', 300, fn() => Service::where('is_active', true)->latest()->take(6)->get());
        $posts = Cache::remember('home_posts', 300, fn() => Post::with('gallery')->latest()->take(3)->get());
        $latestPosts = Cache::remember('home_latest_posts', 300, fn() => Post::with('gallery')->latest()->take(15)->get());
        return view('home.index', compact('services', 'posts', 'latestPosts'));
    }

    public function about()
    {
        return view('home.about');
    }

    public function sitemap()
    {
        $services = Service::where('is_active', true)->get();
        $posts = Post::get();
        $xml = view('home.sitemap', compact('services', 'posts'))->render();
        return Response::make($xml, 200, ['Content-Type' => 'application/xml']);
    }
}
