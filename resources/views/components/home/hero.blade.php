@php($heroImage = $heroImage ?? asset('images/hero.jpeg'))
<section class="relative overflow-hidden h-150 flex items-center" style="padding-top: 80px;">
    <!-- Background Image -->
    <div class="absolute inset-0 hero-bg">
        <img src="{{ $heroImage }}" 
             alt="جوهرة الكويت" 
             class="w-full h-full object-fill md:object-cover transition-transform duration-700 group-hover:scale-110" 
             >
    </div>
</section>