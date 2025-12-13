@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold">الخدمات</h1>
    <div class="grid md:grid-cols-3 gap-6 mt-6">
        @foreach($services as $service)
            <a href="{{ route('services.show',$service->slug) }}" class="rounded border overflow-hidden">
                @if($service->image)
                    <img src="{{ $service->image }}" class="w-full h-48 object-cover" alt="">
                @endif
                <div class="p-4">
                    <div class="font-semibold">{{ $service->title }}</div>
                    <div class="text-sm text-gray-600">{{ $service->short_description }}</div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="mt-6">{{ $services->links() }}</div>
@endsection
