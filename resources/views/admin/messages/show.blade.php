@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-28">
    <h1 class="text-2xl font-bold">تفاصيل الرسالة</h1>
    <div class="mt-4 p-4 border rounded">
        <div>الاسم: {{ $message->name }}</div>
        <div>الهاتف: {{ $message->phone }}</div>
        <div>البريد: {{ $message->email }}</div>
        <div>نوع الخدمة: {{ $message->service_type }}</div>
        <div class="mt-2">الرسالة:</div>
        <pre class="whitespace-pre-wrap">{{ $message->message }}</pre>
    </div>
    <div class="mt-6 flex gap-3">
        <a href="{{ route('admin.messages.toggleRead',$message) }}" class="px-4 py-2 bg-primary text-white rounded">تبديل القراءة</a>
        <form method="post" action="{{ route('admin.messages.destroy',$message) }}">
            @csrf @method('delete')
            <button class="px-4 py-2 bg-red-600 text-white rounded">حذف</button>
        </form>
    </div>
</div>
@endsection
