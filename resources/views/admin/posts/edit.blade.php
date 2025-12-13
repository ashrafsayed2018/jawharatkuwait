@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-2xl font-bold">تعديل مقال</h1>
    <form method="post" action="{{ route('admin.posts.update',$post) }}" enctype="multipart/form-data" class="grid md:grid-cols-2 gap-4 mt-6">
        @csrf @method('put')
        <input name="title" value="{{ $post->title }}" class="border p-3 rounded" required>
        <input type="file" name="image" class="border p-3 rounded">
        <textarea name="content" class="border p-3 rounded md:col-span-2" rows="8" required>{{ $post->content }}</textarea>
        <input name="tags" value="{{ implode(', ', (array) $post->tags) }}" class="border p-3 rounded">
        <input name="published_at" type="date" value="{{ optional($post->published_at)->format('Y-m-d') }}" class="border p-3 rounded">
        <input name="meta_title" value="{{ $post->meta_title }}" class="border p-3 rounded">
        <input name="meta_description" value="{{ $post->meta_description }}" class="border p-3 rounded">
        <button class="px-5 py-3 bg-primary text-white rounded md:col-span-2">حفظ</button>
    </form>
</div>
@endsection
