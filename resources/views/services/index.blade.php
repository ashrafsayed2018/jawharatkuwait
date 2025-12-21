@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-28">
    <h1 class="text-3xl font-bold">الخدمات</h1>
    
    @if($services->isNotEmpty())
        <div class="grid md:grid-cols-3 gap-6 mt-6">
            @foreach($services as $service)
                <x-service.card :href="route('services.show',$service->slug)" :title="$service->title" :description="$service->short_description" :image="$service->image" />
            @endforeach
        </div>
        <div class="mt-6">{{ $services->links() }}</div>
    @else
        @php($fallback = \App\Helpers\ServiceHelper::getFallbackServices())
        <div class="grid md:grid-cols-3 gap-6 mt-6">
            @foreach($fallback as $item)
                @php($slug = \Illuminate\Support\Str::arabicSlug($item['title']))
                <x-service.card 
                    :href="route('services.show',$slug)" 
                    :title="$item['title']" 
                    :description="$item['short_description']" 
                    :image="asset($item['image'])" />
            @endforeach
        </div>
    @endif
@endsection
