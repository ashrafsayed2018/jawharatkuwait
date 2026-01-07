@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-28">
    <article class="prose rtl:prose-invert max-w-none">
        <h1 class="text-4xl md:text-5xl font-bold mb-8 text-gray-900 leading-tight">{{ $post->title }}</h1>
        @if($post->image)
            <img src="{{ $post->image }}" class="w-full h-[50vh] md:h-[80vh] object-cover rounded-2xl shadow-lg mb-8" alt="{{ $post->title }}">
        @endif
        <div class="mt-8 text-lg leading-relaxed text-gray-700">{!! $post->content !!}</div>
        @if($post->tags)
            <div class="mt-10 flex flex-wrap gap-3 pt-6 border-t border-gray-100">
                @foreach($post->tags as $tag)
                    <a href="{{ route('tags.show', Str::arabicSlug($tag)) }}" 
                       class="inline-flex items-center px-4 py-2 rounded-lg bg-gray-50 text-gray-700 hover:bg-primary hover:text-white transition-all duration-300 text-sm font-medium">
                        # {{ $tag }}
                    </a>
                @endforeach
            </div>
        @endif
    </article>

    @if($relatedPosts->count() > 0)
        <div class="mt-16 border-t pt-10">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">مقالات ذات صلة</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedPosts as $relatedPost)
                    <a href="{{ route('post.show', $relatedPost->slug) }}" class="group block bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden border border-gray-100">
                        <div class="h-56 overflow-hidden relative">
                            @if($relatedPost->image)
                                <img src="{{ $relatedPost->image }}" alt="{{ $relatedPost->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-lg text-gray-800 group-hover:text-primary transition-colors line-clamp-2">{{ $relatedPost->title }}</h3>
                            <p class="text-gray-500 text-sm mt-2 line-clamp-2">{{ Str::limit(strip_tags($relatedPost->content), 100) }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
