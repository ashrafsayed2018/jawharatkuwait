@props(['posts'])
<section class="container mx-auto px-4 py-28">
    <h2 class="text-2xl font-semibold">المدونة</h2>
    <div class="grid md:grid-cols-3 gap-6 mt-6">
        @foreach($posts as $post)
            <a href="{{ route('post.show',$post->slug) }}" class="rounded border overflow-hidden hover:shadow-md transition">
                @if($post->image)
                    <img src="{{ asset($post->image) }}" class="w-full h-48 object-cover" alt="">
                @endif
                <div class="p-4">
                    <div class="font-semibold">{{ $post->title }}</div>
                    <div class="text-sm text-gray-600">{{ Str::limit(strip_tags($post->content), 100) }}</div>
                </div>
            </a>
        @endforeach
    </div>
</section>
