@props(['services'])
<section class="container mx-auto px-4 py-12">
    <h2 class="text-2xl font-semibold">الخدمات</h2>
    @php($whatsapp = \App\Models\Setting::where('key','whatsapp')->value('value') ?: '96550850173')
    @if($services->isNotEmpty())
        <div class="grid md:grid-cols-3 gap-6 mt-6">
            @foreach($services as $service)
                <x-service.card :href="route('services.show',$service->slug)" :title="$service->title" :description="$service->short_description" :image="$service->image" />
            @endforeach
        </div>
    @else
        @php($fallback = [
            'تأجير خيام','تأجير دفايات','تأجير زينه','تأجير طاولات وكراسي','تأجير كراسي شفافة',
            'تأجير كراسي عزاء','تأجير كنب أمريكي','تأجير كنب مطروق','تأجير مكيفات','تنسيق جميع الحفلات',
            'خدمة سرفيس','خدمة ضيافة نساء','خدمة ضيافة رجالي','خدمة قهوة بركن'
        ])
        <div class="grid md:grid-cols-3 gap-6 mt-6">
            @foreach($fallback as $title)
                @php($slug = \Illuminate\Support\Str::arabicSlug($title))
                <x-service.card :href="route('services.show',$slug)" :title="$title" :image="'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=800&auto=format&fit=crop'" description="خدمات ضيافة وتأجير وتجهيز مناسبات" />
            @endforeach
        </div>
    @endif
</section>
