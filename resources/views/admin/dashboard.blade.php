@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-2xl font-bold">لوحة التحكم</h1>
    <div class="grid md:grid-cols-3 gap-6 mt-6">
        <div class="p-6 border rounded"><div>الخدمات</div><div class="text-3xl font-bold">{{ $serviceCount }}</div></div>
        <div class="p-6 border rounded"><div>المقالات</div><div class="text-3xl font-bold">{{ $postCount }}</div></div>
        <div class="p-6 border rounded"><div>الرسائل غير المقروءة</div><div class="text-3xl font-bold">{{ $unreadMessages }}</div></div>
    </div>
    <div class="mt-8 flex gap-3">
        <a href="{{ route('admin.services.index') }}" class="px-4 py-2 bg-primary text-white rounded">إدارة الخدمات</a>
        <a href="{{ route('admin.posts.index') }}" class="px-4 py-2 bg-primary text-white rounded">إدارة المقالات</a>
        <a href="{{ route('admin.messages.index') }}" class="px-4 py-2 bg-primary text-white rounded">الرسائل</a>
        <a href="{{ route('admin.settings.index') }}" class="px-4 py-2 bg-primary text-white rounded">الإعدادات</a>
    </div>
</div>
@endsection
