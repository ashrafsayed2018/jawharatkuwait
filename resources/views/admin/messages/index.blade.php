@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-28">
    <h1 class="text-2xl font-bold">رسائل التواصل</h1>
    <table class="w-full mt-6 border">
        <thead><tr><th class="p-2 border">الاسم</th><th class="p-2 border">الهاتف</th><th class="p-2 border">نوع الخدمة</th><th class="p-2 border">مقروء؟</th><th class="p-2 border">إجراءات</th></tr></thead>
        <tbody>
            @foreach($messages as $m)
            <tr>
                <td class="p-2 border">{{ $m->name }}</td>
                <td class="p-2 border">{{ $m->phone }}</td>
                <td class="p-2 border">{{ $m->service_type }}</td>
                <td class="p-2 border">{{ $m->is_read ? 'نعم' : 'لا' }}</td>
                <td class="p-2 border">
                    <a href="{{ route('admin.messages.show',$m) }}" class="underline">عرض</a>
                    <a href="{{ route('admin.messages.toggleRead',$m) }}" class="underline">تبديل القراءة</a>
                    <form method="post" action="{{ route('admin.messages.destroy',$m) }}" class="inline">
                        @csrf @method('delete')
                        <button class="underline text-red-600">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">{{ $messages->links() }}</div>
    <div class="mt-6">
        <a href="{{ route('admin.messages.export') }}" class="px-4 py-2 bg-gray-900 text-white rounded">تصدير CSV</a>
    </div>
</div>
@endsection
