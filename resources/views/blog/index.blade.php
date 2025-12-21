@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-28">
    <h1 class="text-3xl font-bold">المدونة</h1>
    <div class="grid md:grid-cols-3 gap-8 mt-8">
        @foreach($posts as $post)
            <x-post.card 
                :href="route('blog.show',$post->slug)" 
                :title="$post->title" 
                :image="$post->image" 
                :excerpt="$post->meta_description ?? Str::limit(strip_tags($post->content), 100)"
                :date="$post->created_at->translatedFormat('d M Y')"
            />
        @endforeach
    </div>
    <div class="mt-6">{{ $posts->links() }}</div>
</div>
@endsection
