

@props(['services'])
<section class="py-20 bg-gradient-to-b from-white to-gray-50">
    <div class="container mx-auto px-4 py-28">
        
        <!-- Section Header -->
        <div class="text-center mb-16">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                </svg>
                خدماتنا المميزة
            </div>
            
            <!-- Title -->
            <h2 class="text-4xl md:text-5xl font-bold mb-4">
                <span class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 bg-clip-text text-transparent">
                    الخدمات
                </span>
            </h2>
            
            <!-- Subtitle -->
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                نقدم مجموعة شاملة من خدمات الضيافة والتأجير لجميع أنواع المناسبات
            </p>
            
            <!-- Decorative Line -->
            <div class="flex items-center justify-center gap-3 mt-6">
                <div class="w-12 h-1 bg-gradient-to-r from-transparent to-primary rounded-full"></div>
                <div class="w-3 h-3 bg-primary rounded-full"></div>
                <div class="w-12 h-1 bg-gradient-to-l from-transparent to-primary rounded-full"></div>
            </div>
        </div>

        @php($whatsapp = \App\Models\Setting::where('key','whatsapp')->value('value') ?: '50850173')
        
        @if($services->isNotEmpty())
            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <x-service.card 
                        :href="route('services.show',$service->slug)" 
                        :title="$service->title" 
                        :description="$service->short_description" 
                        :image="$service->image" />
                @endforeach
            </div>
        @else
            @php($fallback = [
                ['title' => 'تأجير خيام', 'image' => 'images/جوهرة الكويت لتأجير خيام/جوهرة الكويت لتأجير خيام.webp'],
                ['title' => 'تأجير دفايات', 'image' => 'images/جوهرة الكويت لتأجير دفايات/جوهرة الكويت لتأجير دفايات.webp'],
                ['title' => 'تأجير زينة', 'image' => 'images/جوهرة الكويت لتأجير زينة/جوهرة الكويت لتأجير زينة.webp'],
                ['title' => 'تأجير طاولات وكراسي', 'image' => 'images/جوهرة الكويت لتاجير طاولات وكراسي/tables-chairs.webp'],
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
            
            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($fallback as $item)
                    @php($slug = \Illuminate\Support\Str::arabicSlug($item['title']))
                    <x-service.card 
                        :href="route('services.show',$slug)" 
                        :title="$item['title']" 
                        :image="asset($item['image'])" 
                        description="خدمات ضيافة وتأجير وتجهيز مناسبات" />
                @endforeach
            </div>
        @endif

        <!-- CTA Section -->
        <div class="mt-16 text-center">
            <div class="inline-flex flex-col sm:flex-row items-center gap-4 p-8 rounded-2xl bg-gradient-to-br from-primary/10 via-green-50 to-primary/5 border border-primary/20">
                <div class="text-right">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">هل تحتاج إلى استشارة؟</h3>
                    <p class="text-gray-600">تواصل معنا الآن للحصول على أفضل العروض</p>
                </div>
                <a href="https://wa.me/{{ $whatsapp }}" 
                   target="_blank"
                   class="group relative inline-flex items-center gap-2 px-6 py-3 rounded-xl font-bold overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-xl whitespace-nowrap">
                    <span class="absolute inset-0 bg-gradient-to-r from-primary to-green-600"></span>
                    <svg class="relative z-10 w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    <span class="relative z-10 text-white">تواصل عبر واتساب</span>
                </a>
            </div>
        </div>
    </div>
</section>