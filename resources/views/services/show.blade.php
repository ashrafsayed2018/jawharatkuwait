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
                @php($phone = \App\Models\Setting::where('key','phone')->value('value'))
                @php($whatsapp = \App\Models\Setting::where('key','whatsapp')->value('value') ?: '96550850173')
                <a href="tel:{{ $phone }}" class="px-4 py-2 bg-primary text-white rounded">اتصال</a>
                <a href="https://wa.me/{{ $whatsapp }}" target="_blank" class="px-4 py-2 bg-green-600 text-white rounded">واتساب</a>
                <a href="https://wa.me/{{ $whatsapp }}" target="_blank" class="px-4 py-2 bg-gray-900 text-white rounded">تواصل</a>
            </div>
        </div>
    </div>
</div>
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
  'telephone' => \App\Models\Setting::where('key','phone')->value('value'),
  'areaServed' => 'Kuwait',
  'image' => $service->image,
], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush
