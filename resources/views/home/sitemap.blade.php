<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url><loc>{{ url('/') }}</loc></url>
    <url><loc>{{ route('services.index') }}</loc></url>
    <url><loc>{{ route('about') }}</loc></url>
    <url><loc>{{ route('blog.index') }}</loc></url>
    <url><loc>{{ route('contact.index') }}</loc></url>
    @foreach($services as $service)
        <url><loc>{{ route('services.show',$service->slug) }}</loc></url>
    @endforeach
    @foreach($posts as $post)
        <url><loc>{{ route('blog.show',$post->slug) }}</loc></url>
    @endforeach
</urlset>
