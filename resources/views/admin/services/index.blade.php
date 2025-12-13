@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">الخدمات</h1>
        <a href="{{ route('admin.services.create') }}" class="px-4 py-2 bg-primary text-white rounded">إضافة</a>
    </div>
    <table class="w-full mt-6 border">
        <thead><tr><th class="p-2 border">العنوان</th><th class="p-2 border">نشط</th><th class="p-2 border">إجراءات</th></tr></thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td class="p-2 border">{{ $service->title }}</td>
                <td class="p-2 border">{{ $service->is_active ? 'نعم' : 'لا' }}</td>
                <td class="p-2 border">
                    <a href="{{ route('admin.services.edit',$service) }}" class="underline">تعديل</a>
                    <form method="post" action="{{ route('admin.services.destroy',$service) }}" class="inline">
                        @csrf @method('delete')
                        <button class="underline text-red-600">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">{{ $services->links() }}</div>
</div>
@endsection
