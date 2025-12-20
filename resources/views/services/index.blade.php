@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold">الخدمات</h1>
    <div class="grid md:grid-cols-3 gap-6 mt-6">
        @foreach($services as $service)
            <x-service.card :href="route('services.show',$service->slug)" :title="$service->title" :description="$service->short_description" :image="$service->image" />
        @endforeach
    </div>
    <div class="mt-6">{{ $services->links() }}</div>
@endsection
