<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Service;
use App\Models\ContactMessage;
use App\Models\Tag;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $serviceCount = Service::count();
        $serviceViews = Service::sum('views');
        $postCount = Post::count();
        $postViews = Post::sum('views');
        $unreadMessages = ContactMessage::where('is_read', false)->count();
        $tagCount = Tag::count();
        $tagViews = Tag::sum('views');
        $userCount = User::count();
        
        $latestPosts = Post::latest()->take(5)->get();
        $scheduledPosts = Post::where('published_at', '>', now())->get();

        return view('admin.dashboard', compact(
            'serviceCount', 
            'serviceViews',
            'postCount', 
            'postViews',
            'unreadMessages', 
            'tagCount', 
            'tagViews',
            'userCount',
            'latestPosts',
            'scheduledPosts'
        ));
    }
}

