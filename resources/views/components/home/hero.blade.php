<section class="relative overflow-hidden min-h-screen flex items-center" style="padding-top: 80px;">
    @php($heroImage = ($siteSettings->logo_path ?? null) ? $siteSettings->logo_path : asset('images/جوهرة الكويت خدمة ضيافة رجالي/1.jpeg'))
    
    <!-- Background Image -->
    <div class="absolute inset-0 hero-bg">
        <img src="{{ $heroImage }}" 
             alt="جوهرة الكويت" 
             class="absolute inset-0 w-full h-full object-cover">
    </div>
</section>
