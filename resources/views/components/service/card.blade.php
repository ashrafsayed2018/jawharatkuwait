@props(['href', 'title', 'description' => null, 'image' => null, 'target' => null])
@php($src = $image ?: asset('images/جوهرة الكويت خدمة سيرفس/جوهرة الكويت خدمة سيرفس.webp'))
<a href="{{ $href }}" @if($target) target="{{ $target }}" @endif class="rounded border overflow-hidden shadow-md hover:shadow-lg transition h-[700px] flex flex-col">
    <img src="{{ $src }}" class="w-full h-full object-fill flex-1" alt="{{ $title }}">
    <div class="p-4 bg-white">
        <div class="font-semibold">{{ $title }}</div>
        <div class="text-sm text-green-600">{{ $description ?: 'خدمات ضيافة وتأجير وتجهيز مناسبات' }}</div>
    </div>
</a>
