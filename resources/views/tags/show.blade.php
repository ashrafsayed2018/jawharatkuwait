@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-28">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                </svg>
                وسم
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ $tag->name }}
            </h1>
            <p class="text-gray-600 max-w-2xl mx-auto">
                جميع المقالات المرتبطة بوسم "{{ $tag->name }}"
            </p>
        </div>

        <!-- Posts Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
                <x-post.card 
                    :href="route('post.show',$post->slug)" 
                    :title="$post->title" 
                    :image="asset($post->image)" 
                    :excerpt="$post->meta_description ?? Str::limit(strip_tags($post->content), 100)"
                    :date="$post->created_at->translatedFormat('d M Y')"
                />
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="inline-flex items-center gap-3 px-6 py-4 rounded-2xl bg-white shadow-sm text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>لا توجد مقالات مرتبطة بهذا الوسم حالياً</span>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
