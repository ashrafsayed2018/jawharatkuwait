@props(['href', 'title', 'excerpt' => null, 'image' => null])
<a href="{{ $href }}" class="rounded border overflow-hidden hover:shadow-md transition">
    @if($image)
        <img src="{{ $image }}" class="w-full h-48 object-cover" alt="">
    @endif
    <div class="p-4">
        <div class="font-semibold">{{ $title }}</div>
        @if($excerpt)
            <div class="text-sm text-gray-600">{{ $excerpt }}</div>
        @endif
    </div>
 </a>
