@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-2xl font-bold">إضافة خدمة</h1>
    <form method="post" action="{{ route('admin.services.store') }}" enctype="multipart/form-data" class="grid md:grid-cols-2 gap-4 mt-6">
        @csrf
        <input name="title" class="border p-3 rounded" placeholder="العنوان" required>
        <input type="file" name="image" class="border p-3 rounded">
        <textarea name="short_description" class="border p-3 rounded" rows="3" placeholder="نبذة"></textarea>
        <textarea name="long_description" class="border p-3 rounded md:col-span-2" rows="6" placeholder="التفاصيل"></textarea>
        <input name="meta_title" class="border p-3 rounded" placeholder="عنوان ميتا">
        <input name="meta_description" class="border p-3 rounded" placeholder="وصف ميتا">
        <label class="flex items-center gap-2"><input type="checkbox" name="is_active" value="1" checked> نشط</label>
        <button class="px-5 py-3 bg-primary text-white rounded md:col-span-2">حفظ</button>
    </form>
</div>
@endsection
