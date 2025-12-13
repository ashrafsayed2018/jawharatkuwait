@php($phone = $siteSettings->phone_number ?? '')
@php($whatsapp = $siteSettings->whatsapp_number ?? '96550850173')
<header class="border-b">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <a href="/" class="text-xl font-bold">جوهرة الكويت</a>
        <button type="button" class="md:hidden p-2 rounded border" id="navToggle">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor"><path d="M3 6h18v2H3V6zm0 5h18v2H3v-2zm0 5h18v2H3v-2z"/></svg>
        </button>
        <nav class="hidden md:flex items-center gap-4">
            <a href="{{ route('home') }}" class="rounded px-2 py-1 {{ request()->routeIs('home') ? 'bg-green-600 text-white' : 'hover:text-primary' }}">الرئيسية</a>
            <a href="{{ route('services.index') }}" class="rounded px-2 py-1 {{ request()->routeIs('services.*') ? 'bg-green-600 text-white' : 'hover:text-primary' }}">الخدمات</a>
            <a href="{{ route('about') }}" class="rounded px-2 py-1 {{ request()->routeIs('about') ? 'bg-green-600 text-white' : 'hover:text-primary' }}">من نحن</a>
            <a href="{{ route('blog.index') }}" class="rounded px-2 py-1 {{ request()->routeIs('blog.*') ? 'bg-green-600 text-white' : 'hover:text-primary' }}">المدونة</a>
            <a href="{{ route('contact.index') }}" class="rounded px-2 py-1 {{ request()->routeIs('contact.*') ? 'bg-green-600 text-white' : 'hover:text-primary' }}">تواصل</a>
        </nav>
        <div class="hidden md:flex items-center gap-2">
            <a href="tel:{{ $phone }}" class="px-3 py-2 rounded bg-primary text-white">اتصال</a>
            <a href="https://wa.me/{{ $whatsapp }}" target="_blank" class="px-3 py-2 rounded bg-green-600 text-white">واتساب</a>
        </div>
    </div>
</header>
<div id="navOverlay" class="hidden fixed inset-0 bg-black/50 z-50"></div>
<div id="navPanel" class="hidden fixed top-0 right-0 w-64 h-full bg-white z-50 shadow-lg transform translate-x-full transition">
    <div class="p-4 flex items-center justify-between border-b">
        <div class="text-xl font-bold">جوهرة الكويت</div>
        <button type="button" class="p-2 rounded border" id="navClose">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M18.3 5.71L12 12.01l-6.3-6.3L4.29 7.11l6.3 6.3-6.3 6.3 1.41 1.41 6.3-6.3 6.3 6.3 1.41-1.41-6.3-6.3 6.3-6.3z"/></svg>
        </button>
    </div>
    <nav class="flex flex-col p-4 gap-3">
        <a href="{{ route('home') }}" class="px-3 py-2 rounded hover:bg-gray-100 {{ request()->routeIs('home') ? 'bg-green-600 text-white' : '' }}">الرئيسية</a>
        <a href="{{ route('services.index') }}" class="px-3 py-2 rounded hover:bg-gray-100 {{ request()->routeIs('services.*') ? 'bg-green-600 text-white' : '' }}">الخدمات</a>
        <a href="{{ route('about') }}" class="px-3 py-2 rounded hover:bg-gray-100 {{ request()->routeIs('about') ? 'bg-green-600 text-white' : '' }}">من نحن</a>
        <a href="{{ route('blog.index') }}" class="px-3 py-2 rounded hover:bg-gray-100 {{ request()->routeIs('blog.*') ? 'bg-green-600 text-white' : '' }}">المدونة</a>
        <a href="{{ route('contact.index') }}" class="px-3 py-2 rounded hover:bg-gray-100 {{ request()->routeIs('contact.*') ? 'bg-green-600 text-white' : '' }}">تواصل</a>
        <div class="mt-4 flex items-center gap-2">
            <a href="tel:{{ $phone }}" class="px-3 py-2 rounded bg-primary text-white flex-1 text-center">اتصال</a>
            <a href="https://wa.me/{{ $whatsapp }}" target="_blank" class="px-3 py-2 rounded bg-green-600 text-white flex-1 text-center">واتساب</a>
        </div>
    </nav>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('navToggle');
    const panel = document.getElementById('navPanel');
    const overlay = document.getElementById('navOverlay');
    const closeBtn = document.getElementById('navClose');
    const open = () => {
        panel.classList.remove('hidden');
        overlay.classList.remove('hidden');
        setTimeout(() => { panel.classList.remove('translate-x-full'); }, 0);
    };
    const close = () => {
        panel.classList.add('translate-x-full');
        overlay.classList.add('hidden');
        setTimeout(() => { panel.classList.add('hidden'); }, 200);
    };
    if (toggle) toggle.addEventListener('click', open);
    if (closeBtn) closeBtn.addEventListener('click', close);
    if (overlay) overlay.addEventListener('click', close);
});
</script>
