@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">المقالات</h1>
        <a href="{{ route('admin.posts.create') }}" class="px-4 py-2 bg-primary text-white rounded">إضافة</a>
    </div>
    <table class="w-full mt-6 border">
        <thead><tr><th class="p-2 border">العنوان</th><th class="p-2 border">الخدمة</th><th class="p-2 border">تاريخ النشر</th><th class="p-2 border">إجراءات</th></tr></thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td class="p-2 border">{{ $post->title }}</td>
                <td class="p-2 border">{{ optional($post->service)->title ?? '-' }}</td>
                <td class="p-2 border">{{ optional($post->published_at)->format('Y-m-d') }}</td>
                <td class="p-2 border">
                    <a href="{{ route('admin.posts.edit',$post) }}" class="underline">تعديل</a>
                    <form method="post" action="{{ route('admin.posts.destroy',$post) }}" class="inline">
                        @csrf @method('delete')
                        <button class="underline text-red-600">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">{{ $posts->links() }}</div>
</div>
@endsection
