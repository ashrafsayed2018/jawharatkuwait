
@php($phone = $siteSettings->phone_number ?? '50850173')
@php($whatsapp = $siteSettings->whatsapp_number ?? '50850173')

<!-- Modern Navbar with Glassmorphism -->
<header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" id="mainNav">
    <div class="absolute inset-0 bg-white/80 backdrop-blur-md border-b border-gray-200/50"></div>
    
    <div class="container mx-auto px-4 py-3 relative">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <a href="/" class="relative z-10 transition-transform duration-300 hover:scale-105">
                <h1 class="text-2xl md:text-3xl font-bold text-green-600 drop-shadow-sm font-serif">
                    جوهرة الكويت
                </h1>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center gap-1">
                <a href="{{ route('home') }}" 
                   class="relative px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 group
                          {{ request()->routeIs('home') ? 'text-white' : 'text-gray-700 hover:text-primary' }}">
                    <span class="relative z-10">الرئيسية</span>
                    @if(request()->routeIs('home'))
                        <span class="absolute inset-0 bg-gradient-to-r from-primary to-green-500 rounded-lg"></span>
                    @else
                        <span class="absolute inset-0 bg-gray-100 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    @endif
                </a>

                <a href="{{ route('services.index') }}" 
                   class="relative px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 group
                          {{ request()->routeIs('services.*') ? 'text-white' : 'text-gray-700 hover:text-primary' }}">
                    <span class="relative z-10">الخدمات</span>
                    @if(request()->routeIs('services.*'))
                        <span class="absolute inset-0 bg-gradient-to-r from-primary to-green-500 rounded-lg"></span>
                    @else
                        <span class="absolute inset-0 bg-gray-100 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    @endif
                </a>

                <a href="{{ route('about') }}" 
                   class="relative px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 group
                          {{ request()->routeIs('about') ? 'text-white' : 'text-gray-700 hover:text-primary' }}">
                    <span class="relative z-10">من نحن</span>
                    @if(request()->routeIs('about'))
                        <span class="absolute inset-0 bg-gradient-to-r from-primary to-green-500 rounded-lg"></span>
                    @else
                        <span class="absolute inset-0 bg-gray-100 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    @endif
                </a>

                <a href="{{ route('blog.index') }}" 
                   class="relative px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 group
                          {{ request()->routeIs('blog.*') ? 'text-white' : 'text-gray-700 hover:text-primary' }}">
                    <span class="relative z-10">المدونة</span>
                    @if(request()->routeIs('blog.*'))
                        <span class="absolute inset-0 bg-gradient-to-r from-primary to-green-500 rounded-lg"></span>
                    @else
                        <span class="absolute inset-0 bg-gray-100 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    @endif
                </a>

                <a href="{{ route('gallery.index') }}" 
                   class="relative px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 group
                          {{ request()->routeIs('gallery.*') ? 'text-white' : 'text-gray-700 hover:text-primary' }}">
                    <span class="relative z-10">معرض الصور</span>
                    @if(request()->routeIs('gallery.*'))
                        <span class="absolute inset-0 bg-gradient-to-r from-primary to-green-500 rounded-lg"></span>
                    @else
                        <span class="absolute inset-0 bg-gray-100 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    @endif
                </a>

                <a href="{{ route('contact.index') }}" 
                   class="relative px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 group
                          {{ request()->routeIs('contact.*') ? 'text-white' : 'text-gray-700 hover:text-primary' }}">
                    <span class="relative z-10">تواصل</span>
                    @if(request()->routeIs('contact.*'))
                        <span class="absolute inset-0 bg-gradient-to-r from-primary to-green-500 rounded-lg"></span>
                    @else
                        <span class="absolute inset-0 bg-gray-100 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    @endif
                </a>
            </nav>

            <!-- CTA Buttons -->
            <div class="hidden lg:flex items-center gap-3">
                <a href="tel:{{ $phone }}" 
                   class="group relative px-5 py-2.5 rounded-xl font-medium text-sm overflow-hidden transition-all duration-300 hover:shadow-lg hover:scale-105">
                    <span class="absolute inset-0 bg-gradient-to-r from-primary to-green-500"></span>
                    <span class="relative z-10 text-white flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        اتصال
                    </span>
                </a>

                <a href="https://wa.me/{{ Str::startsWith($whatsapp, '965') ? $whatsapp : '965'.$whatsapp }}" 
                   target="_blank"
                   class="group relative px-5 py-2.5 rounded-xl font-medium text-sm overflow-hidden transition-all duration-300 hover:shadow-lg hover:scale-105">
                    <span class="absolute inset-0 bg-gradient-to-r from-green-500 to-green-600"></span>
                    <span class="relative z-10 text-white flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        واتساب
                    </span>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button type="button" 
                    class="lg:hidden p-2 rounded-xl bg-gray-100 hover:bg-gray-200 transition-colors duration-300" 
                    id="navToggle">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Menu Overlay -->
<div id="navOverlay" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-50 opacity-0 transition-opacity duration-300"></div>

<!-- Mobile Menu Panel -->
<div id="navPanel" class="hidden fixed top-0 right-0 w-80 h-full bg-white z-50 shadow-2xl transform translate-x-full transition-transform duration-300">
    <!-- Panel Header -->
    <div class="p-5 flex items-center justify-between border-b border-gray-100 bg-gradient-to-r from-primary/5 to-green-50">
        <a href="/">
            <h1 class="text-xl font-bold text-green-600 drop-shadow-sm font-serif">
                جوهرة الكويت
            </h1>
        </a>
        <button type="button" 
                class="p-2 rounded-lg bg-white hover:bg-gray-100 transition-colors duration-300 shadow-sm" 
                id="navClose">
            <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Panel Navigation -->
    <nav class="flex flex-col p-4 gap-2 overflow-y-auto" style="max-height: calc(100vh - 180px);">
        <a href="{{ route('home') }}" 
           class="px-4 py-3 rounded-xl font-medium transition-all duration-300 {{ request()->routeIs('home') ? 'bg-gradient-to-r from-primary to-green-500 text-white shadow-lg' : 'hover:bg-gray-50 text-gray-700' }}">
            الرئيسية
        </a>
        <a href="{{ route('services.index') }}" 
           class="px-4 py-3 rounded-xl font-medium transition-all duration-300 {{ request()->routeIs('services.*') ? 'bg-gradient-to-r from-primary to-green-500 text-white shadow-lg' : 'hover:bg-gray-50 text-gray-700' }}">
            الخدمات
        </a>
        <a href="{{ route('about') }}" 
           class="px-4 py-3 rounded-xl font-medium transition-all duration-300 {{ request()->routeIs('about') ? 'bg-gradient-to-r from-primary to-green-500 text-white shadow-lg' : 'hover:bg-gray-50 text-gray-700' }}">
            من نحن
        </a>
        <a href="{{ route('blog.index') }}" 
           class="px-4 py-3 rounded-xl font-medium transition-all duration-300 {{ request()->routeIs('blog.*') ? 'bg-gradient-to-r from-primary to-green-500 text-white shadow-lg' : 'hover:bg-gray-50 text-gray-700' }}">
            المدونة
        </a>
        <a href="{{ route('gallery.index') }}" 
           class="px-4 py-3 rounded-xl font-medium transition-all duration-300 {{ request()->routeIs('gallery.*') ? 'bg-gradient-to-r from-primary to-green-500 text-white shadow-lg' : 'hover:bg-gray-50 text-gray-700' }}">
            معرض الصور
        </a>
        <a href="{{ route('contact.index') }}" 
           class="px-4 py-3 rounded-xl font-medium transition-all duration-300 {{ request()->routeIs('contact.*') ? 'bg-gradient-to-r from-primary to-green-500 text-white shadow-lg' : 'hover:bg-gray-50 text-gray-700' }}">
            تواصل
        </a>
    </nav>

    <!-- Panel CTA Buttons -->
    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-white via-white to-transparent">
        <div class="flex flex-col gap-3">
            <a href="tel:{{ $phone }}" 
               class="px-4 py-3 rounded-xl font-medium text-center bg-gradient-to-r from-primary to-green-500 text-white shadow-lg hover:shadow-xl transition-all duration-300 flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                </svg>
                اتصال الآن
            </a>
            <a href="https://wa.me/{{ $whatsapp }}" 
               target="_blank"
               class="px-4 py-3 rounded-xl font-medium text-center bg-gradient-to-r from-green-500 to-green-600 text-white shadow-lg hover:shadow-xl transition-all duration-300 flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                واتساب
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const nav = document.getElementById('mainNav');
    const toggle = document.getElementById('navToggle');
    const panel = document.getElementById('navPanel');
    const overlay = document.getElementById('navOverlay');
    const closeBtn = document.getElementById('navClose');

    // Navbar scroll effect
    let lastScroll = 0;
    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;
        
        if (currentScroll > 100) {
            nav.classList.add('shadow-lg');
        } else {
            nav.classList.remove('shadow-lg');
        }
        
        lastScroll = currentScroll;
    });

    // Mobile menu functions
    const open = () => {
        panel.classList.remove('hidden');
        overlay.classList.remove('hidden');
        requestAnimationFrame(() => {
            panel.classList.remove('translate-x-full');
            overlay.classList.remove('opacity-0');
        });
        document.body.style.overflow = 'hidden';
    };

    const close = () => {
        panel.classList.add('translate-x-full');
        overlay.classList.add('opacity-0');
        document.body.style.overflow = '';
        setTimeout(() => {
            panel.classList.add('hidden');
            overlay.classList.add('hidden');
        }, 300);
    };

    if (toggle) toggle.addEventListener('click', open);
    if (closeBtn) closeBtn.addEventListener('click', close);
    if (overlay) overlay.addEventListener('click', close);
});
</script>
