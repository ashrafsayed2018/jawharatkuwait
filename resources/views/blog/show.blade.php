@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <article class="prose rtl:prose-invert max-w-none">
        <h1>{{ $post->title }}</h1>
        @if($post->image)
            <img src="{{ $post->image }}" class="w-full rounded" alt="">
        @endif
        <div class="mt-4">{!! $post->content !!}</div>
        @if($post->tags)
            <div class="mt-6 flex gap-2">
                @foreach($post->tags as $tag)
                    <span class="px-3 py-1 bg-gray-200 rounded">{{ $tag }}</span>
                @endforeach
            </div>
        @endif
    </article>
</div>
@endsection

@push('head')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "{{ $post->title }}",
  "datePublished": "{{ optional($post->published_at)->toIso8601String() }}",
  "image": "{{ $post->image }}",
  "author": {
    "@type": "Organization",
    "name": "جوهرة الكويت"
  }
}
</script>
@endpush
