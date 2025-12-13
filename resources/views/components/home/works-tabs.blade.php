@props(['groups' => null])
@php($defaultGroups = [
    ['title' => 'تأجير خيام', 'images' => [
        'https://images.unsplash.com/photo-1559572733-f62d00c1af87?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1501862471517-90d38b9f31b6?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1511295701401-6f928d96544e?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1556740738-b6a63e27c4df?q=80&w=800&auto=format&fit=crop',
    ]],
    ['title' => 'تأجير دفايات', 'images' => [
        'https://images.unsplash.com/photo-1480597846433-30ef2e3feff8?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1506224477009-87aa1cde95cc?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1509320351477-a1e1902d2b7b?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1493761789782-54eea0a44a38?q=80&w=800&auto=format&fit=crop',
    ]],
    ['title' => 'تأجير زينه', 'images' => [
        'https://images.unsplash.com/photo-1520975940470-0f8a1a2f3683?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1519681393784-d120267933ba?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1513542789411-b6a5d4f31634?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1520880867055-1e30d1cb001c?q=80&w=800&auto=format&fit=crop',
    ]],
    ['title' => 'تأجير طاولات وكراسي', 'images' => [
        'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1527980965255-d3b416303d12?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1489710437720-ebb67ec84dd2?q=80&w=800&auto=format&fit=crop',
    ]],
    ['title' => 'تأجير كراسي شفافة', 'images' => [
        'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1493666438817-866a91353ca9?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1496157977997-31d6f223e5e9?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1496307042754-b4aa456c4a2d?q=80&w=800&auto=format&fit=crop',
    ]],
    ['title' => 'تأجير كراسي عزاء', 'images' => [
        'https://images.unsplash.com/photo-1520881365763-1c60f3e8d5a9?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1500534314210-ec0786601bed?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1500534314197-83bb9223c6f5?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1500534314202-8fdb4b1543a6?q=80&w=800&auto=format&fit=crop',
    ]],
    ['title' => 'تأجير كنب أمريكي', 'images' => [
        'https://images.unsplash.com/photo-1449247666642-264389b5f5eb?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1501045661006-fcebe0257c3f?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1479705872057-5a6d1af0be26?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1524758631624-e2822e304c36?q=80&w=800&auto=format&fit=crop',
    ]],
    ['title' => 'تأجير كنب مطروق', 'images' => [
        'https://images.unsplash.com/photo-1505691938895-1758d7feb511?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1473531761844-5a14668e9422?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1493666407336-495f6f43ed9f?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1493666438817-866a91353ca9?q=80&w=800&auto=format&fit=crop',
    ]],
    ['title' => 'تأجير مكيفات', 'images' => [
        'https://images.unsplash.com/photo-1503454537195-1dcabbf87adf?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1523413651479-597eb2da0ad6?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1524758631624-e2822e304c36?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1505691938895-1758d7feb511?q=80&w=800&auto=format&fit=crop',
    ]],
    ['title' => 'تنسيق جميع الحفلات', 'images' => [
        'https://images.unsplash.com/photo-1520975940470-0f8a1a2f3683?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1519681393784-d120267933ba?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1513542789411-b6a5d4f31634?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1520880867055-1e30d1cb001c?q=80&w=800&auto=format&fit=crop',
    ]],
    ['title' => 'خدمة سرفيس', 'images' => [
        'https://images.unsplash.com/photo-1504674906381-0e42e06e666b?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1504674906381-0e42e06e666b?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1544025162-d76694265947?q=80&w=800&auto=format&fit=crop',
    ]],
    ['title' => 'خدمة ضيافة نساء', 'images' => [
        'https://images.unsplash.com/photo-1517673400267-0250062c7b36?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1511985139391-1dc1e24f5f07?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1511988617509-a57c8a288c69?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1511988617509-a57c8a288c69?q=80&w=800&auto=format&fit=crop',
    ]],
    ['title' => 'خدمة تنسيق التلفونات', 'images' => [
        'https://images.unsplash.com/photo-1512499617640-c2f999098c44?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=800&auto=format&fit=crop',
    ]],
    ['title' => 'خدمة ضيافة رجالي', 'images' => [
        'https://images.unsplash.com/photo-1439542243647-2525d79866f1?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1523413651479-597eb2da0ad6?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1511988617509-a57c8a288c69?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1544025162-d76694265947?q=80&w=800&auto=format&fit=crop',
    ]],
    ['title' => 'خدمة قهوة بركن', 'images' => [
        'https://images.unsplash.com/photo-1511920170033-f8396924ce26?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=800&auto=format&fit=crop',
    ]],
])
@php($groups = $groups ?: $defaultGroups)
<section class="container mx-auto px-4 py-12">
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
                        <img src="{{ $img }}" class="w-full h-40 object-cover rounded" alt="">
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
