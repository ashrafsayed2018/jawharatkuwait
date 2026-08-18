@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-28">
    <div class="text-center mb-10">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900">المدونة</h1>
        <p class="text-gray-500 mt-2">أحدث المقالات والأخبار حول خدماتنا وفعالياتنا</p>
    </div>

    <form action="{{ route('blog.index') }}" method="GET" class="max-w-2xl mx-auto mb-12">
        <div class="group relative">
            <div class="absolute -inset-0.5 rounded-2xl bg-linear-to-r from-primary to-green-500 opacity-0 group-focus-within:opacity-30 blur-sm transition-opacity duration-300"></div>
            <div class="relative flex items-center bg-white/90 backdrop-blur-md rounded-2xl shadow-lg border border-gray-100 group-focus-within:border-transparent transition-all duration-300">
                <div class="flex items-center justify-center ps-5 text-gray-400 group-focus-within:text-primary transition-colors duration-300 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="search" value="{{ $search }}" placeholder="ابحث في المقالات..."
                       class="w-full py-4 px-3 bg-transparent rounded-2xl focus:outline-none text-gray-700 placeholder:text-gray-400">
                @if($search)
                    <a href="{{ route('blog.index') }}" class="flex items-center justify-center pe-4 text-gray-400 hover:text-gray-600 shrink-0" title="مسح البحث">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                @endif
                <button type="submit" class="me-1.5 my-1.5 px-6 py-2.5 rounded-xl font-medium text-sm text-white bg-linear-to-r from-primary to-green-500 hover:shadow-md active:scale-95 transition-all duration-300 shrink-0">
                    بحث
                </button>
            </div>
        </div>

        @if($search)
            <div class="flex items-center justify-center gap-2 mt-4 text-sm text-gray-500">
                <span>نتائج البحث عن</span>
                <span class="inline-flex items-center gap-1.5 bg-primary/10 text-primary font-medium px-3 py-1 rounded-full">
                    "{{ $search }}"
                    <a href="{{ route('blog.index') }}" class="hover:text-green-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                </span>
                <span>({{ $posts->total() }} {{ $posts->total() == 1 ? 'نتيجة' : 'نتائج' }})</span>
            </div>
        @endif
    </form>

    <div class="grid md:grid-cols-3 gap-8 mt-8">
        @forelse($posts as $post)
            <x-post.card
                :href="route('post.show',$post->slug)"
                :title="$post->title"
                :image="asset($post->image)"
                :excerpt="$post->meta_description ?? Str::limit(strip_tags($post->content), 100)"
                :date="$post->created_at->translatedFormat('d M Y')"
            />
        @empty
            <div class="col-span-full text-center py-20">
                <div class="text-gray-300 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <p class="text-xl text-gray-500">
                    @if($search)
                        لا توجد نتائج بحث عن "{{ $search }}".
                    @else
                        لا توجد مقالات حالياً.
                    @endif
                </p>
            </div>
        @endforelse
    </div>
    <div class="mt-6">{{ $posts->links() }}</div>
</div>

<livewire:rating-widget />
@endsection
