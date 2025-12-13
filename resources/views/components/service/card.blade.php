@props(['href', 'title', 'description' => null, 'image' => null, 'target' => null])
@php($src = $image ?: 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=800&auto=format&fit=crop')
<a href="{{ $href }}" @if($target) target="{{ $target }}" @endif class="rounded border overflow-hidden shadow-md hover:shadow-lg transition">
    <img src="{{ $src }}" class="w-full h-48 object-cover" alt="">
    <div class="p-4">
        <div class="font-semibold">{{ $title }}</div>
        <div class="text-sm text-green-600">{{ $description ?: 'خدمات ضيافة وتأجير وتجهيز مناسبات' }}</div>
    </div>
</a>
