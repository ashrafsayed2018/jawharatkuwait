@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold">المدونة</h1>
    <div class="grid md:grid-cols-3 gap-6 mt-6">
        @foreach($posts as $post)
            <a href="{{ route('blog.show',$post->slug) }}" class="rounded border overflow-hidden">
                @if($post->image)
                    <img src="{{ $post->image }}" class="w-full h-48 object-cover" alt="">
                @endif
                <div class="p-4">
                    <div class="font-semibold">{{ $post->title }}</div>
                    <div class="text-sm text-gray-600">{{ Str::limit(strip_tags($post->content), 100) }}</div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="mt-6">{{ $posts->links() }}</div>
</div>
@endsection
