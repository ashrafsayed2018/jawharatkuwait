@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-2xl font-bold">إضافة مقال</h1>
    <form method="post" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data" class="grid md:grid-cols-2 gap-4 mt-6">
        @csrf
        <input name="title" class="border p-3 rounded" placeholder="العنوان" required>
        <input type="file" name="image" class="border p-3 rounded">
        <textarea name="content" class="border p-3 rounded md:col-span-2" rows="8" placeholder="المحتوى" required></textarea>
        <input name="tags" class="border p-3 rounded" placeholder="وسوم (مفصولة بفواصل)">
        <input name="published_at" type="date" class="border p-3 rounded">
        <input name="meta_title" class="border p-3 rounded" placeholder="عنوان ميتا">
        <input name="meta_description" class="border p-3 rounded" placeholder="وصف ميتا">
        <button class="px-5 py-3 bg-primary text-white rounded md:col-span-2">حفظ</button>
    </form>
</div>
@endsection
