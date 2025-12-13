<section class="relative overflow-hidden lg:h-screen">
    @php($heroImage = ($siteSettings->logo_path ?? null) ? $siteSettings->logo_path : 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=1600&auto=format&fit=crop')
    <img src="{{ $heroImage }}" alt="" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/40 to-black/20"></div>
    <div class="container mx-auto px-4 py-20 lg:h-screen relative flex items-center justify-center">
        <div class="text-center max-w-3xl mx-auto">
            <h1 class="text-4xl font-bold tracking-tight text-green-600 inline-block  px-4 py-2 rounded">جوهرة الكويت للمناسبات والضيافة</h1>
            <p class="mt-3 text-white inline-block bg-black/30 px-3 py-2 rounded">تنظيم كامل للمناسبات الخاصة والعامة مع فريق محترف وتجهيزات فاخرة</p>
            <div class="mt-6 flex justify-center gap-3">
                @php($whatsapp = $siteSettings->whatsapp_number ?? '96550850173')
                <a href="https://wa.me/{{ $whatsapp }}" target="_blank" class="px-6 py-3 bg-primary text-white rounded">احجز الآن</a>
                <a href="{{ route('services.index') }}" class="px-6 py-3 rounded bg-red-600 text-white">استكشف الخدمات</a>
            </div>
        </div>
    </div>
</section>
