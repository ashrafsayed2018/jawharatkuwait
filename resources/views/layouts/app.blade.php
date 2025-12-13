<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($metaTitle) ? $metaTitle : ($metaTitle ?? config('app.name')) }}</title>
    @if(isset($metaDescription))
        <meta name="description" content="{{ $metaDescription }}">
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <style>body{font-family:'Cairo',ui-sans-serif,system-ui,-apple-system,'Segoe UI',Roboto,'Noto Sans','Ubuntu','Cantarell','Helvetica Neue',Arial,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'}</style>
    @vite(['resources/css/app.css','resources/js/app.js'])
    @stack('head')
</head>
<body class="bg-white text-gray-900">
    <x-navbar />
    <main>
        @yield('content')
    </main>
    <footer class="mt-12 border-t">
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row justify-between gap-6">
                <div>
                    <div class="font-semibold">جوهرة الكويت للضيافة والمناسبات</div>
                    <div>الهاتف: <a href="tel:{{ $siteSettings->phone_number ?? '' }}" class="underline">{{ $siteSettings->phone_number ?? '' }}</a></div>
                    @php($email = \App\Models\Setting::where('key','email')->value('value'))
                    <div>البريد: <a href="mailto:{{ $email }}" class="underline">{{ $email }}</a></div>
                </div>
                <div class="flex flex-col gap-2">
                    <a href="{{ route('services.index') }}">الخدمات</a>
                    <a href="{{ route('about') }}">من نحن</a>
                    <a href="{{ route('blog.index') }}">المدونة</a>
                    <a href="https://wa.me/{{ $siteSettings->whatsapp_number ?? '96550850173' }}">تواصل</a>
                </div>
            </div>
            <div class="mt-6 text-sm">© {{ date('Y') }}</div>
        </div>
    </footer>
    @if(!request()->is('admin*'))
        <x-floating-contacts />
    @endif
</body>
</html>
