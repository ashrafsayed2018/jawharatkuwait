@props(['services'])
<section class="container mx-auto px-4 py-12">
    <h2 class="text-2xl font-semibold">الخدمات</h2>
    @php($whatsapp = \App\Models\Setting::where('key','whatsapp')->value('value') ?: '50850173')
    @if($services->isNotEmpty())
        <div class="grid md:grid-cols-3 gap-6 mt-6">
            @foreach($services as $service)
                <x-service.card :href="route('services.show',$service->slug)" :title="$service->title" :description="$service->short_description" :image="$service->image" />
            @endforeach
        </div>
    @else
        @php($fallback = [
            ['title' => 'تأجير خيام', 'image' => 'images/جوهرة الكويت لتأجير خيام/جوهرة الكويت لتأجير خيام.webp'],
            ['title' => 'تأجير دفايات', 'image' => 'images/جوهرة الكويت لتأجير دفايات/جوهرة الكويت لتأجير دفايات.webp'],
            ['title' => 'تأجير زينة', 'image' => 'images/جوهرة الكويت لتأجير زينة/جوهرة الكويت لتأجير زينة.webp'],
            ['title' => 'تأجير طاولات وكراسي', 'image' => 'images/جوهرة الكويت لتاجير طاولات وكراسي/جوهرة الكويت للضيافة/جوهرة الكويت لتأجير طاولات وكراسي (1).webp'],
            ['title' => 'تأجير كراسي شفافة', 'image' => 'images/جوهرة الكويت لتأجير كراسي شفافة/جوهرة الكويت لتأجير كراسي شفافة.webp'],
            ['title' => 'تأجير كراسي عزاء', 'image' => 'images/جوهرة الكويت لتأجير كراسي عزاء/جوهرة الكويت تأجير كراسي عزاء.webp'],
            ['title' => 'تأجير كنب أمريكي', 'image' => 'images/جوهرة الكويت لتأجير كنب امريكي/جوهرة الكويت لتأجير كنب امريكي.webp'],
            ['title' => 'تأجير كنب مطروق', 'image' => 'images/جوهرة الكويت لتأجير كنب مطروق/جوهرة الكويت لتأجير كنب مطروق.webp'],
            ['title' => 'تأجير مكيفات', 'image' => 'images/جوهرة الكويت لتأجير مكيفات/جوهرة الكويت لتأجير مكيفات.webp'],
            ['title' => 'تنسيق جميع الحفلات', 'image' => 'images/جوهرة الكويت لتأجير زينة/جوهرة الكويت لتأجير زينة (2).webp'],
            ['title' => 'خدمة سيرفس', 'image' => 'images/جوهرة الكويت خدمة سيرفس/جوهرة الكويت خدمة سيرفس.webp'],
            ['title' => 'خدمة ضيافة نساء', 'image' => 'images/جوهرة الكويت خدمة ضيافة نساء/جوهرة الكويت خدمة ضيافة نساء.webp'],
            ['title' => 'خدمة ضيافة رجالي', 'image' => 'images/جوهرة الكويت خدمة ضيافة رجالي/جوهرة الكويت خدمة ضيافة رجالي.webp'],
            ['title' => 'خدمة فاليه بركن', 'image' => 'images/جوهرة الكويت خدمة فاليه بركن/جوهرة الكويت خدمة فاليه بركن.webp']
        ])
        <div class="grid md:grid-cols-3 gap-6 mt-6">
            @foreach($fallback as $item)
                @php($slug = \Illuminate\Support\Str::arabicSlug($item['title']))
                <x-service.card :href="route('services.show',$slug)" :title="$item['title']" :image="asset($item['image'])" description="خدمات ضيافة وتأجير وتجهيز مناسبات" />
            @endforeach
        </div>
    @endif
</section>
