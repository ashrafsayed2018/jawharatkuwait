@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-28">
    <h1 class="text-2xl font-bold">الإعدادات العامة</h1>
    @if(!$setting)
        <div class="mt-6 p-6 border rounded bg-white">
            <div>لا توجد إعدادات حالياً.</div>
            <a href="{{ route('admin.settings.create') }}" class="mt-4 inline-block px-4 py-2 bg-primary text-white rounded">إضافة إعدادات</a>
        </div>
    @else
        <div class="mt-6 p-6 border rounded bg-white">
            <div class="grid md:grid-cols-2 gap-4">
                <div><span class="font-semibold">اسم الموقع:</span> {{ $setting->site_name }}</div>
                <div><span class="font-semibold">الهاتف:</span> {{ $setting->phone_number }}</div>
                <div><span class="font-semibold">واتساب:</span> {{ $setting->whatsapp_number }}</div>
                <div><span class="font-semibold">إنستغرام:</span> {{ $setting->instagram_url }}</div>
                <div><span class="font-semibold">سناب شات:</span> {{ $setting->snapchat_url }}</div>
                <div><span class="font-semibold">تيك توك:</span> {{ $setting->tiktok_url }}</div>
                <div><span class="font-semibold">عنوان SEO:</span> {{ $setting->meta_title }}</div>
                <div><span class="font-semibold">وصف SEO:</span> {{ Str::limit($setting->meta_description, 120) }}</div>
                <div><span class="font-semibold">الشعار:</span> {{ $setting->logo_path }}</div>
                <div><span class="font-semibold">الأيقونة:</span> {{ $setting->favicon_path }}</div>
            </div>
            <a href="{{ route('admin.settings.edit',$setting) }}" class="mt-4 inline-block px-4 py-2 bg-primary text-white rounded">تعديل الإعدادات</a>
        </div>
    @endif
</div>
@endsection
