@props(['title', 'count', 'icon', 'color', 'link' => null, 'views' => null])

@if($link)
<a href="{{ $link }}" class="block">
@endif
    <div class="bg-white rounded-lg shadow-sm border-r-4 p-6 flex items-center justify-between transition-transform hover:-translate-y-1" style="border-color: {{ $color }};">
        <div>
            <div class="text-gray-500 text-sm mb-1 font-medium">{{ $title }}</div>
            <div class="text-3xl font-bold text-gray-800">{{ $count }}</div>
            @if($views !== null)
                <div class="text-xs text-gray-400 mt-2 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <span>{{ $views }} مشاهدة</span>
                </div>
            @endif
        </div>
        <div class="p-3 rounded-full flex items-center justify-center" style="background-color: {{ $color }}20; color: {{ $color }};">
            {{ $slot }}
        </div>
    </div>
@if($link)
</a>
@endif
