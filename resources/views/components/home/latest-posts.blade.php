@props(['posts'])
<section class="container mx-auto px-4 py-12">
    <h2 class="text-2xl font-semibold">أحدث المقالات</h2>
    <div class="grid md:grid-cols-3 gap-6 mt-6">
        @forelse($posts as $post)
            <x-post.card :href="route('blog.show',$post->slug)" :title="$post->title" :image="$post->image" :excerpt="Str::limit(strip_tags($post->content), 120)" />
        @empty
            @php($fallback = [
                ['title' => 'أفضل خدمات الضيافة للمناسبات', 'desc' => 'نوفر طاقم ضيافة محترف لجميع مناسباتكم الخاصة والعامة.', 'img' => 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=800&auto=format&fit=crop'],
                ['title' => 'تنسيق الضيافة والقهوة العربية', 'desc' => 'جلسات قهوة عربية مع ضيافة فاخرة تناسب جميع الأذواق.', 'img' => 'https://images.unsplash.com/photo-1544025162-d76694265947?q=80&w=800&auto=format&fit=crop'],
                ['title' => 'ضيافة نسائية ورجالية متكاملة', 'desc' => 'فرق ضيافة نسائية ورجالية مدربة لخدمتكم في كل وقت.', 'img' => 'https://images.unsplash.com/photo-1519710164239-da123dc03ef4?q=80&w=800&auto=format&fit=crop'],
                ['title' => 'تجهيز المناسبات والبوفيهات', 'desc' => 'تنظيم وتقديم بوفيهات متنوعة مع لمسات فنية مميزة.', 'img' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=800&auto=format&fit=crop'],
                ['title' => 'خدمة سرفيس وضيافة راقية', 'desc' => 'خدمة سرفيس عالية الجودة لضمان تجربة ضيافة مثالية.', 'img' => 'https://images.unsplash.com/photo-1544025162-d76694265947?q=80&w=800&auto=format&fit=crop'],
            ])
            @foreach($fallback as $f)
                <x-post.card :href="route('contact.index')" :title="$f['title']" :image="$f['img']" :excerpt="$f['desc']" />
            @endforeach
        @endforelse
    </div>
</section>
