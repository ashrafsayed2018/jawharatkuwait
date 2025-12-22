@props(['groups' => null])
@php($defaultGroups = [
    ['title' => 'تأجير خيام', 'images' => [
        'images/جوهرة الكويت لتأجير خيام/1.jpeg',
        'images/جوهرة الكويت لتأجير خيام/2.jpeg',
        'images/جوهرة الكويت لتأجير خيام/3.jpeg',
        'images/جوهرة الكويت لتأجير خيام/4.jpeg',
    ]],
    ['title' => 'تأجير دفايات', 'images' => [
        'images/جوهرة الكويت لتأجير دفايات/1.jpeg',
        'images/جوهرة الكويت لتأجير دفايات/2.jpeg',
        'images/جوهرة الكويت لتأجير دفايات/3.jpeg',
        'images/جوهرة الكويت لتأجير دفايات/4.jpeg',
    ]],
    ['title' => 'تأجير ليتات زينة', 'images' => [
        'images/تأجير ليتات زينة/1.jpeg',
        'images/تأجير ليتات زينة/2.jpeg',
        'images/تأجير ليتات زينة/3.jpeg',
        'images/تأجير ليتات زينة/4.jpeg',
    ]],
    ['title' => 'تأجير طاولات وكراسي', 'images' => [
        'images/جوهرة الكويت لتاجير طاولات وكراسي/1.jpeg',
        'images/جوهرة الكويت لتاجير طاولات وكراسي/2.jpeg',
        'images/جوهرة الكويت لتاجير طاولات وكراسي/3.jpeg',
        'images/جوهرة الكويت لتاجير طاولات وكراسي/4.jpeg',
    ]],
    ['title' => 'تأجير كراسي شفافة', 'images' => [
        'images/جوهرة الكويت لتأجير كراسي شفافة/1.jpeg',
        'images/جوهرة الكويت لتأجير كراسي شفافة/2.jpeg',
        'images/جوهرة الكويت لتأجير كراسي شفافة/3.jpeg',
        'images/جوهرة الكويت لتأجير كراسي شفافة/4.jpeg',
    ]],
    ['title' => 'تأجير كراسي عزاء', 'images' => [
        'images/جوهرة الكويت لتأجير كراسي عزاء/1.jpeg',
        'images/جوهرة الكويت لتأجير كراسي عزاء/2.jpeg',
        'images/جوهرة الكويت لتأجير كراسي عزاء/3.jpeg',
        'images/جوهرة الكويت لتأجير كراسي عزاء/4.jpeg',
    ]],
    ['title' => 'تأجير قنفات
', 'images' => [
        'images/جوهرة الكويت لتأجير قنفات
/1.jpeg',
        'images/جوهرة الكويت لتأجير قنفات
/2.jpeg',
        'images/جوهرة الكويت لتأجير قنفات
/3.jpeg',
        'images/جوهرة الكويت لتأجير قنفات
/4.jpeg',
    ]],
    ['title' => 'تأجير كنب مطروق', 'images' => [
        'images/جوهرة الكويت لتأجير كنب مطروق/1.jpeg',
        'images/جوهرة الكويت لتأجير كنب مطروق/2.jpeg',
        'images/جوهرة الكويت لتأجير كنب مطروق/3.jpeg',
        'images/جوهرة الكويت لتأجير كنب مطروق/4.jpeg',
    ]],
    ['title' => 'تأجير مكيفات', 'images' => [
        'images/جوهرة الكويت لتأجير مكيفات/1.jpeg',
        'images/جوهرة الكويت لتأجير مكيفات/2.jpeg',
        'images/جوهرة الكويت لتأجير مكيفات/3.jpeg',
        'images/جوهرة الكويت لتأجير مكيفات/4.jpeg',
    ]],
    ['title' => 'تنسيق جميع الحفلات', 'images' => [
        'images/تأجير ليتات زينة/2.jpeg',
        'images/تأجير ليتات زينة/3.jpeg',
        'images/جوهرة الكويت خدمة سيرفس/2.jpeg',
        'images/جوهرة الكويت خدمة سيرفس/3.jpeg',
    ]],
    ['title' => 'خدمة سرفيس', 'images' => [
        'images/جوهرة الكويت خدمة سيرفس/1.jpeg',
        'images/جوهرة الكويت خدمة سيرفس/2.jpeg',
        'images/جوهرة الكويت خدمة سيرفس/3.jpeg',
        'images/جوهرة الكويت خدمة سيرفس/4.jpeg',
    ]],
    ['title' => 'خدمه ضيافه نسائي ', 'images' => [
        'images/جوهرة الكويت خدمه ضيافه نسائي /1.jpeg',
        'images/جوهرة الكويت خدمه ضيافه نسائي /2.jpeg',
        'images/جوهرة الكويت خدمه ضيافه نسائي /3.jpeg',
        'images/جوهرة الكويت خدمه ضيافه نسائي /4.jpeg',
    ]],
    ['title' => 'خدمة تنسيق التلفونات', 'images' => [
        'images/جوهرة الكويت خدمة تفتيش تلفونات/جوهرة الكويت خدمة تفتيش تلفونات.webp',
        'images/جوهرة الكويت خدمة تفتيش تلفونات/جوهرة الكويت خدمة تفتيش تلفونات.webp',
        'images/جوهرة الكويت خدمة تفتيش تلفونات/جوهرة الكويت خدمة تفتيش تلفونات.webp',
        'images/جوهرة الكويت خدمة تفتيش تلفونات/جوهرة الكويت خدمة تفتيش تلفونات.webp',
    ]],
    ['title' => 'خدمة ضيافة رجالي', 'images' => [
        'images/جوهرة الكويت خدمة ضيافة رجالي/1.jpeg',
        'images/جوهرة الكويت خدمة ضيافة رجالي/2.jpeg',
        'images/جوهرة الكويت خدمة ضيافة رجالي/3.jpeg',
        'images/جوهرة الكويت خدمة ضيافة رجالي/4.jpeg',
    ]],
    ['title' => 'خدمة قهوة بركن', 'images' => [
        'images/جوهرة الكويت خدمة فاليه بركن/1.jpeg',
        'images/جوهرة الكويت خدمة فاليه بركن/2.jpeg',
        'images/جوهرة الكويت خدمة فاليه بركن/3.jpeg',
        'images/جوهرة الكويت خدمة فاليه بركن/4.jpeg',
    ]],
])
@php($groups = $groups ?: $defaultGroups)
<section class="container mx-auto px-4 py-28">
    <h2 class="text-2xl font-semibold">أعمالنا</h2>
    <div class="mt-6">
        <div class="flex flex-wrap gap-2">
            @foreach($groups as $idx => $g)
                <button type="button" class="tab-btn px-3 py-1 rounded border hover:bg-gray-100 {{ $idx === 0 ? 'bg-green-600 text-white' : '' }}" data-tab="{{ $idx }}">{{ $g['title'] }}</button>
            @endforeach
        </div>
        <div class="mt-6">
            @foreach($groups as $idx => $g)
                <div class="tab-panel grid md:grid-cols-4 gap-4" data-panel="{{ $idx }}" style="{{ $idx === 0 ? '' : 'display:none' }}">
                    @foreach(array_slice($g['images'], 0, 4) as $img)
                        <img src="{{ asset($img) }}"    class="w-full h-full object-fill transition-transform duration-700 group-hover:scale-110" 
                    loading="lazy" alt="{{ pathinfo($img, PATHINFO_FILENAME) }}">
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const buttons = document.querySelectorAll('.tab-btn');
            const panels = document.querySelectorAll('[data-panel]');
            buttons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const target = btn.getAttribute('data-tab');
                    panels.forEach(p => p.style.display = (p.getAttribute('data-panel') === target) ? '' : 'none');
                    buttons.forEach(b => {
                        b.classList.remove('bg-green-600','text-white');
                    });
                    btn.classList.add('bg-green-600','text-white');
                });
            });
        });
    </script>
</section>
