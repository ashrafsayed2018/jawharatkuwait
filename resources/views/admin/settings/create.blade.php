@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-28">
    <h1 class="text-2xl font-bold">إضافة إعدادات الموقع</h1>
    <form method="post" action="{{ route('admin.settings.store') }}" enctype="multipart/form-data" class="mt-6 grid md:grid-cols-2 gap-4">
        @csrf
        <div>
            <label class="block mb-1">اسم الموقع</label>
            <input name="site_name" value="{{ old('site_name') }}" class="w-full border p-3 rounded" required>
        </div>
        <div>
            <label class="block mb-1">الهاتف</label>
            <input name="phone_number" value="{{ old('phone_number') }}" class="w-full border p-3 rounded">
        </div>
        <div>
            <label class="block mb-1">رقم واتساب</label>
            <input name="whatsapp_number" value="{{ old('whatsapp_number') }}" class="w-full border p-3 rounded" placeholder="مثال: 96550850173">
        </div>
        <div>
            <label class="block mb-1">رابط إنستغرام</label>
            <input name="instagram_url" value="{{ old('instagram_url') }}" class="w-full border p-3 rounded" placeholder="https://instagram.com/username">
        </div>
        <div>
            <label class="block mb-1">رابط سناب شات</label>
            <input name="snapchat_url" value="{{ old('snapchat_url') }}" class="w-full border p-3 rounded" placeholder="https://snapchat.com/add/username">
        </div>
        <div>
            <label class="block mb-1">رابط تيك توك</label>
            <input name="tiktok_url" value="{{ old('tiktok_url') }}" class="w-full border p-3 rounded" placeholder="https://www.tiktok.com/@username">
        </div>
        <div class="md:col-span-2">
            <label class="block mb-1">عنوان SEO</label>
            <input name="meta_title" value="{{ old('meta_title') }}" class="w-full border p-3 rounded">
        </div>
        <div class="md:col-span-2">
            <label class="block mb-1">وصف SEO</label>
            <textarea name="meta_description" class="w-full border p-3 rounded" rows="3">{{ old('meta_description') }}</textarea>
        </div>
        <div class="md:col-span-2">
            <label class="block mb-1">الشروط والأحكام</label>
            <textarea name="terms_conditions" class="w-full border p-3 rounded" rows="4">{{ old('terms_conditions') }}</textarea>
        </div>
        <div class="md:col-span-2">
            <label class="block mb-1">سياسة الخصوصية</label>
            <textarea name="privacy_policy" class="w-full border p-3 rounded" rows="4">{{ old('privacy_policy') }}</textarea>
        </div>
        <div>
            <label class="block mb-1">الشعار</label>
            <input type="file" name="logo" class="w-full border p-3 rounded">
        </div>
        <div>
            <label class="block mb-1">الأيقونة</label>
            <input type="file" name="favicon" class="w-full border p-3 rounded">
        </div>
        <div class="md:col-span-2">
            <button class="px-5 py-3 bg-primary text-white rounded">حفظ</button>
        </div>
    </form>
</div>
@endsection
