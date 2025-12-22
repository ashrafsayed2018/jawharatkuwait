@props(['href', 'title', 'excerpt' => null, 'image' => null, 'date' => null])

<a href="{{ $href }}" class="group flex flex-col h-full bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
    <!-- Image Container -->
    <div class="relative overflow-hidden aspect-[16/10]">
        @if($image)
            <img src="{{ $image }}" 
                 class="w-full h-full object-fill" 
                 loading="lazy"
                 alt="{{ $title }}">
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        @else
            <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-400">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        @endif
        
        @if($date)
            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-semibold text-gray-700 shadow-sm">
                {{ $date }}
            </div>
        @endif
    </div>

    <!-- Content -->
    <div class="flex flex-col flex-1 p-6">
        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-primary transition-colors duration-300 line-clamp-2">
            {{ $title }}
        </h3>
        
        @if($excerpt)
            <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-3 flex-1">
                {{ $excerpt }}
            </p>
        @endif

        <!-- Footer -->
        <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between text-sm">
            <span class="font-semibold text-primary group-hover:translate-x-1 transition-transform duration-300 inline-flex items-center gap-1">
                اقرأ المزيد
                <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </span>
        </div>
    </div>
</a>
