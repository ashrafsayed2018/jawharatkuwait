@props(['services'])
<section class="container mx-auto px-4 py-12">
    <h2 class="text-2xl font-semibold">صور من أعمالنا</h2>
    <div class="grid md:grid-cols-4 gap-4 mt-6">
        @foreach($services as $service)
            @if($service->image)
                <img src="{{ $service->image }}" class="w-full h-40 object-cover rounded" alt="">
            @endif
        @endforeach
    </div>
    <div class="mt-6 text-center">
        <a href="{{ route('services.index') }}" class="px-5 py-3 border rounded">عرض جميع الخدمات</a>
    </div>
</section>
