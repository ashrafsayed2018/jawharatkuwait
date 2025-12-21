@props(['posts'])
<section class="container mx-auto px-4 py-28">
    <h2 class="text-2xl font-semibold">أحدث المقالات</h2>
    <div class="grid md:grid-cols-3 gap-8 mt-8">
        @forelse($posts as $post)
            <x-post.card 
                :href="route('blog.show',$post->slug)" 
                :title="$post->title" 
                :image="$post->image" 
                :excerpt="$post->meta_description ?? Str::limit(strip_tags($post->content), 120)"
                :date="$post->created_at->translatedFormat('d M Y')"
            />
        @empty
            @php($fallback = [
                ['title' => 'أفضل خدمات الضيافة للمناسبات', 'desc' => 'نوفر طاقم ضيافة محترف لجميع مناسباتكم الخاصة والعامة.', 'img' => 'images/جوهرة الكويت خدمة سيرفس/جوهرة الكويت خدمة سيرفس.webp'],
                ['title' => 'تنسيق الضيافة والقهوة العربية', 'desc' => 'جلسات قهوة عربية مع ضيافة فاخرة تناسب جميع الأذواق.', 'img' => 'images/جوهرة الكويت خدمة ضيافة رجالي/جوهرة الكويت خدمة ضيافة رجالي.webp'],
                ['title' => 'ضيافة نسائية ورجالية متكاملة', 'desc' => 'فرق ضيافة نسائية ورجالية مدربة لخدمتكم في كل وقت.', 'img' => 'images/جوهرة الكويت خدمة ضيافة نساء/جوهرة الكويت خدمة ضيافة نساء.webp'],
                ['title' => 'تجهيز المناسبات والبوفيهات', 'desc' => 'تنظيم وتقديم بوفيهات متنوعة مع لمسات فنية مميزة.', 'img' => 'images/جوهرة الكويت لتاجير طاولات وكراسي/tables-chairs.webp'],
                ['title' => 'خدمة سرفيس وضيافة راقية', 'desc' => 'خدمة سرفيس عالية الجودة لضمان تجربة ضيافة مثالية.', 'img' => 'images/جوهرة الكويت خدمة سيرفس/جوهرة الكويت خدمة سيرفس (2).webp'],
            ])
            @foreach($fallback as $f)
                <x-post.card :href="route('contact.index')" :title="$f['title']" :image="asset($f['img'])" :excerpt="$f['desc']" />
            @endforeach
        @endforelse
    </div>
</section>
