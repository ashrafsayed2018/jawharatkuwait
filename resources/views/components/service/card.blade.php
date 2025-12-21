@props(['href', 'title', 'description' => null, 'image' => null, 'target' => null])
@php($src = $image ?: asset('images/جوهرة الكويت خدمة سيرفس/جوهرة الكويت خدمة سيرفس.webp'))

<a href="{{ $href }}" 
   @if($target) target="{{ $target }}" @endif 
   class="group relative flex flex-col bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
    
    <!-- Image Container with Overlay -->
    <div class="relative h-64 overflow-hidden bg-gray-100">
        <!-- Image -->
        <img src="{{ $src }}" 
             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
             alt="{{ $title }}"
             loading="lazy">
        
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-500"></div>
        
        <!-- Hover Icon -->
        <div class="absolute top-4 left-4 w-12 h-12 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500 transform -translate-y-2 group-hover:translate-y-0">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
        </div>
        
        <!-- Green Accent Border (appears on hover) -->
        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-primary via-green-400 to-primary transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
    </div>

    <!-- Content -->
    <div class="flex-1 p-6 flex flex-col">
        <!-- Title -->
        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-primary transition-colors duration-300">
            {{ $title }}
        </h3>
        
        <!-- Description -->
        <p class="text-gray-600 text-sm mb-4 flex-1 line-clamp-2">
            {{ $description ?: 'خدمات ضيافة وتأجير وتجهيز مناسبات' }}
        </p>
        
        <!-- Footer with Arrow -->
        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
            <span class="text-primary font-semibold text-sm group-hover:text-green-600 transition-colors duration-300">
                عرض التفاصيل
            </span>
            <div class="w-8 h-8 rounded-full bg-primary/10 group-hover:bg-primary flex items-center justify-center transition-all duration-300">
                <svg class="w-4 h-4 text-primary group-hover:text-white transition-all duration-300 transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Decorative Corner (appears on hover) -->
    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-primary/20 to-transparent rounded-bl-full opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
</a>

<style>
/* Line clamp utility for description */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>