@props(['href', 'title', 'excerpt' => null, 'image' => null])
<a href="{{ $href }}" class="rounded border overflow-hidden hover:shadow-md transition flex flex-col h-full bg-white">
    @if($image)
        <img src="{{ $image }}" class="w-full h-48 object-cover" alt="{{ $title }}">
    @endif
    <div class="p-4 flex-1">
        <div class="font-semibold mb-2">{{ $title }}</div>
        @if($excerpt)
            <div class="text-sm text-gray-600 line-clamp-3">{{ $excerpt }}</div>
        @endif
    </div>
 </a>
