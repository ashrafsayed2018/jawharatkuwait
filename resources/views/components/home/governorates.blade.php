<section class="container mx-auto px-4 py-12">
    <h2 class="text-2xl font-semibold">نخدم جميع محافظات الكويت</h2>
    @php($areas = ['العاصمة','حولي','الفروانية','الجهراء','الأحمدي','مبارك الكبير'])
    <div class="mt-6 flex flex-wrap gap-3">
        @foreach($areas as $area)
            <span class="px-4 py-2 rounded-full border bg-white shadow-sm">{{ $area }}</span>
        @endforeach
    </div>
</section>
