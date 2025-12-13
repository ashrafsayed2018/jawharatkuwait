@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-primary/10 via-green-50 to-white flex items-center">
    <div class="container mx-auto px-4">
        <div class="mx-auto max-w-5xl grid md:grid-cols-2 gap-6">
            <div class="rounded-2xl shadow-lg bg-white/80 backdrop-blur px-8 py-10">
                <div class="text-center">
                    <div class="mx-auto w-20 h-20 rounded-full bg-primary/10 flex items-center justify-center text-primary text-3xl">👤</div>
                    <h1 class="mt-4 text-2xl font-bold">تسجيل الدخول</h1>
                </div>
                <form method="post" action="{{ route('login.post') }}" class="mt-6 space-y-4">
                    @csrf
                    <div class="relative">
                        <span class="absolute top-1/2 -translate-y-1/2 right-3 text-gray-400">✉️</span>
                        <input name="email" value="{{ old('email') }}" type="email" class="w-full border p-3 pr-10 rounded focus:outline-none focus:ring-2 focus:ring-primary" placeholder="البريد الإلكتروني" required>
                    </div>
                    <div class="relative">
                        <span class="absolute top-1/2 -translate-y-1/2 right-3 text-gray-400">🔒</span>
                        <input name="password" type="password" class="w-full border p-3 pr-10 rounded focus:outline-none focus:ring-2 focus:ring-primary" placeholder="كلمة المرور" required>
                    </div>
                    <label class="flex items-center gap-2 text-sm"><input type="checkbox" name="remember" value="1" class="rounded"> تذكرني</label>
                    @error('email')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
                    <button class="w-full px-5 py-3 bg-primary text-white rounded">دخول</button>
                    <div class="text-sm text-center">لا تملك حساباً؟ <a href="{{ route('register') }}" class="text-primary underline">إنشاء حساب</a></div>
                </form>
            </div>
            <div class="rounded-2xl shadow-lg bg-white/60 backdrop-blur px-8 py-10 hidden md:block">
                <h2 class="text-2xl font-semibold text-center">مرحبا بك في جوهرة الكويت</h2>
                <p class="mt-3 text-center text-gray-600">سجل الآن لإدارة المحتوى والخدمات بسهولة.</p>
                <div class="mt-6 flex justify-center">
                    <a href="{{ route('register') }}" class="px-6 py-3 border border-primary text-primary rounded">إنشاء حساب جديد</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
