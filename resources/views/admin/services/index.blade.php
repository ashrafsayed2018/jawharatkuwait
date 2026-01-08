@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-28">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">الخدمات</h1>
        <a href="{{ route('admin.services.create') }}" class="px-4 py-2 bg-primary text-white rounded">إضافة</a>
    </div>
    <table class="w-full mt-6 border">
        <thead><tr><th class="p-2 border">العنوان</th><th class="p-2 border">المشاهدات</th><th class="p-2 border">نشط</th><th class="p-2 border">إجراءات</th></tr></thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td class="p-2 border">{{ $service->title }}</td>
                <td class="p-2 border">
                    <span class="flex items-center gap-1">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        {{ $service->views }}
                    </span>
                </td>
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
