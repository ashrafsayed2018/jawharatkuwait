@props(['title', 'count', 'icon', 'color', 'link' => null])

@if($link)
<a href="{{ $link }}" class="block">
@endif
    <div class="bg-white rounded-lg shadow-sm border-r-4 p-6 flex items-center justify-between transition-transform hover:-translate-y-1" style="border-color: {{ $color }};">
        <div>
            <div class="text-gray-500 text-sm mb-1 font-medium">{{ $title }}</div>
            <div class="text-3xl font-bold text-gray-800">{{ $count }}</div>
        </div>
        <div class="p-3 rounded-full flex items-center justify-center" style="background-color: {{ $color }}20; color: {{ $color }};">
            {{ $slot }}
        </div>
    </div>
@if($link)
</a>
@endif
