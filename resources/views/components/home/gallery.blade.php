@props(['services'])
<section class="container mx-auto px-4 py-28">
    <h2 class="text-2xl font-semibold">صور من أعمالنا</h2>
    
    @if($services->isNotEmpty())
        <div class="grid md:grid-cols-4 gap-4 mt-6">
            @foreach($services as $service)
                @if($service->image)
                    <img src="{{ $service->image }}" 
                      class="w-full h-full object-fill transition-transform duration-700 group-hover:scale-110" 
                    loading="lazy"
                    alt="{{ $service->title }}"
                    >
                @endif
            @endforeach
        </div>
    @else
        @php($fallback = \App\Helpers\ServiceHelper::getFallbackServices())
        <div class="grid md:grid-cols-4 gap-4 mt-6">
            @foreach($fallback as $item)
                <img src="{{ asset($item['image']) }}" 
                   class="w-full h-full object-fill transition-transform duration-700 group-hover:scale-110" 
                    loading="lazy"s
                 alt="{{ $item['title'] }}">
            @endforeach
        </div>
    @endif

    <div class="mt-6 text-center">
        <a href="{{ route('services.index') }}" class="px-5 py-3 border rounded">عرض جميع الخدمات</a>
    </div>
</section>
