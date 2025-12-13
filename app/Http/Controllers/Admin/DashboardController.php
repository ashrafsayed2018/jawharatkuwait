<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Service;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $serviceCount = Service::count();
        $postCount = Post::count();
        $unreadMessages = ContactMessage::where('is_read', false)->count();
        return view('admin.dashboard', compact('serviceCount', 'postCount', 'unreadMessages'));
    }
}

