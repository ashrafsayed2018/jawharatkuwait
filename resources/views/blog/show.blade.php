@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-28">
    <article class="prose rtl:prose-invert max-w-none">
        <h1>{{ $post->title }}</h1>
        @if($post->image)
            <img src="{{ $post->image }}" class="w-full h-[50vh] md:h-[80vh] object-cover rounded" alt="{{ $post->title }}">
        @endif
        <div class="mt-4">{!! $post->content !!}</div>
        @if($post->tags)
            <div class="mt-6 flex gap-2">
                @foreach($post->tags as $tag)
                    <span class="px-3 py-1 bg-gray-200 rounded">{{ $tag }}</span>
                @endforeach
            </div>
        @endif
    </article>
</div>
@endsection
