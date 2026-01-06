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
        $postCount = Post::count();
        $unreadMessages = ContactMessage::where('is_read', false)->count();
        $tagCount = Tag::count();
        $userCount = User::count();
        
        $latestPosts = Post::latest()->take(5)->get();
        $scheduledPosts = Post::where('published_at', '>', now())->get();

        return view('admin.dashboard', compact(
            'serviceCount', 
            'postCount', 
            'unreadMessages', 
            'tagCount', 
            'userCount',
            'latestPosts',
            'scheduledPosts'
        ));
    }
}

