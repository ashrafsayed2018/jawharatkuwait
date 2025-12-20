<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::with(['gallery'])->withCount('posts')->latest()->paginate(20);
        return view('admin.tags.index', compact('tags'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:tags,name'],
            'gallery_id' => ['nullable', 'exists:galleries,id'],
        ]);
        
        $data['slug'] = Str::arabicSlug($data['name']);
        
        // Ensure slug is unique
        $originalSlug = $data['slug'];
        $count = 1;
        while (Tag::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $originalSlug . '-' . $count++;
        }
        
        Tag::create($data);
        return redirect()->route('admin.tags.index')->with('success', 'تم إضافة الوسم بنجاح');
    }

    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:tags,name,' . $tag->id],
            'gallery_id' => ['nullable', 'exists:galleries,id'],
        ]);

        $tag->update($data);
        
        // Update the 'tags' JSON column in related posts to keep them in sync
        foreach ($tag->posts as $post) {
            $postTags = $post->relatedTags()->pluck('name')->toArray();
            $post->tags = $postTags;
            $post->saveQuietly();
        }

        return redirect()->route('admin.tags.index')->with('success', 'تم تحديث الوسم بنجاح');
    }

    public function destroy(Tag $tag)
    {
        $posts = $tag->posts;
        $tag->posts()->detach();
        $tag->delete();
        
        foreach ($posts as $post) {
            $postTags = $post->relatedTags()->pluck('name')->toArray();
            $post->tags = $postTags;
            $post->saveQuietly();
        }

        return redirect()->route('admin.tags.index')->with('success', 'تم حذف الوسم بنجاح');
    }
}
