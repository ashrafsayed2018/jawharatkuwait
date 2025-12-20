@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="grid md:grid-cols-2 gap-6">
        <div>
            @if($service->image)
                <img src="{{ $service->image }}" class="w-full rounded" alt="">
            @endif
        </div>
        <div>
            <h1 class="text-3xl font-bold">{{ $service->title }}</h1>
            <div class="mt-4 prose max-w-none rtl:prose-invert">{!! nl2br(e($service->long_description)) !!}</div>
            <div class="mt-6 flex gap-2">
                @php($phone = \App\Models\Setting::where('key','phone')->value('value') ?: '50850173')
                @php($whatsapp = \App\Models\Setting::where('key','whatsapp')->value('value') ?: '50850173')
                <a href="tel:{{ $phone }}" class="px-4 py-2 bg-primary text-white rounded">اتصال</a>
                <a href="https://wa.me/{{ Str::startsWith($whatsapp, '965') ? $whatsapp : '965'.$whatsapp }}" target="_blank" class="px-4 py-2 bg-green-600 text-white rounded">واتساب</a>
                <a href="https://wa.me/{{ Str::startsWith($whatsapp, '965') ? $whatsapp : '965'.$whatsapp }}" target="_blank" class="px-4 py-2 bg-gray-900 text-white rounded">تواصل</a>
            </div>
        </div>
    </div>
</div>

@if($service->galleries->isNotEmpty())
<div class="container mx-auto px-4 py-12 bg-gray-50">
    <h2 class="text-2xl font-semibold mb-6">معرض الصور</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($service->galleries as $gallery)
            <div class="rounded overflow-hidden border bg-white hover:shadow-lg transition duration-300">
                <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title ?? 'Service Image' }}" class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300">
            </div>
        @endforeach
    </div>
</div>
@endif

<div class="container mx-auto px-4 py-12">
    <h2 class="text-2xl font-semibold">مقالات ذات صلة</h2>
    <div class="grid md:grid-cols-3 gap-6 mt-6">
        @forelse($relatedPosts as $post)
            <a href="{{ route('blog.show',$post->slug) }}" class="rounded border overflow-hidden hover:shadow-md transition">
                @if($post->image)
                    <img src="{{ $post->image }}" class="w-full h-48 object-cover" alt="">
                @endif
                <div class="p-4">
                    <div class="font-semibold">{{ $post->title }}</div>
                    <div class="text-sm text-gray-600">{{ Str::limit(strip_tags($post->content), 100) }}</div>
                </div>
            </a>
        @empty
            <div class="text-gray-600">لا توجد مقالات ذات صلة حالياً.</div>
        @endforelse
    </div>
</div>
@endsection

@push('head')
<script type="application/ld+json">
{!! json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'LocalBusiness',
  'name' => 'جوهرة الكويت',
  'description' => $service->short_description,
  'url' => url()->current(),
  'telephone' => \App\Models\Setting::where('key','phone')->value('value') ?: '50850173',
  'areaServed' => 'Kuwait',
  'image' => $service->image,
], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush
