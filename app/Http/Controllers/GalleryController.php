<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $images = Gallery::when($search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhereHas('services', function ($q) use ($search) {
                        $q->where('title', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('tags', function ($q) use ($search) {
                        $q->where('name', 'like', '%' . $search . '%');
                    });
            })
            ->latest()
            ->get();

        return view('gallery.index', compact('images', 'search'));
    }
}
