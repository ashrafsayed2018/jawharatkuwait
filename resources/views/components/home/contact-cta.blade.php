<section class="bg-gray-50">
    <div class="container mx-auto px-4 py-28 text-center">
        <div class="font-semibold">تواصل سريع</div>
        <div class="mt-4 flex justify-center gap-3">
            @php($phone = \App\Models\Setting::where('key','phone')->value('value') ?: '50850173')
            @php($whatsapp = \App\Models\Setting::where('key','whatsapp')->value('value') ?: '50850173')
            <a href="tel:{{ $phone }}" class="px-5 py-3 bg-primary text-white rounded">اتصال</a>
            <a href="https://wa.me/{{ Str::startsWith($whatsapp, '965') ? $whatsapp : '965'.$whatsapp }}" target="_blank" class="px-5 py-3 bg-green-600 text-white rounded">واتساب</a>
        </div>
    </div>
</section>
