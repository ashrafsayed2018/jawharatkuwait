
@extends('layouts.app')

@section('content')

<!-- Hero Section with Service Info -->
<section class="relative pt-24 pb-16 bg-gradient-to-br from-gray-50 via-white to-primary/5">
    <div class="container mx-auto px-4">
        
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm text-gray-600 mb-8">
            <a href="{{ route('home') }}" class="hover:text-primary transition-colors">الرئيسية</a>
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
            </svg>
            <a href="{{ route('services.index') }}" class="hover:text-primary transition-colors">الخدمات</a>
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
            </svg>
            <span class="text-primary font-medium">{{ $service->title }}</span>
        </nav>

        <div class="grid lg:grid-cols-2 gap-12 items-start">
            
            <!-- Image Section -->
            <div class="relative group">
                @if($service->image)
                    <!-- Main Image Container -->
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                        <img src="{{ $service->image }}" 
                           class="w-full h-full object-fill transition-transform duration-700 group-hover:scale-110" 
             loading="lazy"
                             alt="{{ $service->title }}">
                        
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <!-- Decorative Corner -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-primary/30 to-transparent rounded-bl-full"></div>
                        <div class="absolute bottom-0 left-0 w-32 h-32 bg-gradient-to-tr from-primary/30 to-transparent rounded-tr-full"></div>
                    </div>

                    <!-- Floating Badge -->
                    <div class="absolute -top-4 -right-4 bg-gradient-to-r from-primary to-green-600 text-white px-6 py-3 rounded-2xl shadow-xl transform rotate-3 hover:rotate-0 transition-transform duration-300">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="font-bold text-sm">خدمة مميزة</span>
                        </div>
                    </div>

                    <!-- Decorative Elements -->
                    <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-primary/10 rounded-full blur-2xl"></div>
                    <div class="absolute -top-6 -right-6 w-32 h-32 bg-green-500/10 rounded-full blur-2xl"></div>
                @endif
            </div>

            <!-- Content Section -->
            <div class="space-y-8">
                
                <!-- Title -->
                <div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        خدمة احترافية
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">
                        {{ $service->title }}
                    </h1>
                </div>

                <!-- Description -->
                <div class="prose prose-lg max-w-none rtl:prose-invert text-gray-700 leading-relaxed">
                    {!! nl2br(e($service->long_description)) !!}
                </div>

                <!-- Features (if available) -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex items-start gap-3 p-4 rounded-xl bg-white border border-gray-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">جودة عالية</div>
                            <div class="text-sm text-gray-600">معايير احترافية</div>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 p-4 rounded-xl bg-white border border-gray-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">خدمة سريعة</div>
                            <div class="text-sm text-gray-600">استجابة فورية</div>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 p-4 rounded-xl bg-white border border-gray-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">أسعار منافسة</div>
                            <div class="text-sm text-gray-600">عروض مميزة</div>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 p-4 rounded-xl bg-white border border-gray-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">فريق محترف</div>
                            <div class="text-sm text-gray-600">خبرة طويلة</div>
                        </div>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-wrap gap-4 pt-4">
                    @php($phone = \App\Models\Setting::where('key','phone')->value('value') ?: '50850173')
                    @php($whatsapp = \App\Models\Setting::where('key','whatsapp')->value('value') ?: '50850173')
                    
                    <a href="tel:{{ $phone }}" 
                       class="group relative inline-flex items-center gap-3 px-6 py-4 rounded-xl font-bold overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-xl flex-1 sm:flex-none">
                        <span class="absolute inset-0 bg-gradient-to-r from-primary to-green-600"></span>
                        <svg class="relative z-10 w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        <span class="relative z-10 text-white">اتصال فوري</span>
                    </a>

                    <a href="https://wa.me/{{ Str::startsWith($whatsapp, '965') ? $whatsapp : '965'.$whatsapp }}" 
                       target="_blank"
                       class="group relative inline-flex items-center gap-3 px-6 py-4 rounded-xl font-bold overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-xl flex-1 sm:flex-none">
                        <span class="absolute inset-0 bg-gradient-to-r from-green-500 to-green-600"></span>
                        <svg class="relative z-10 w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        <span class="relative z-10 text-white">واتساب</span>
                    </a>

                    <a href="{{ route('contact.index') }}" 
                       class="group relative inline-flex items-center gap-3 px-6 py-4 rounded-xl font-bold overflow-hidden transition-all duration-300 hover:scale-105 flex-1 sm:flex-none">
                        <span class="absolute inset-0 bg-white/10 backdrop-blur-md border-2 border-gray-300"></span>
                        <span class="absolute inset-0 bg-gray-100 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                        <svg class="relative z-10 w-5 h-5 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        <span class="relative z-10 text-gray-700 group-hover:text-gray-900">تواصل معنا</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
@if($service->galleries->isNotEmpty())
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        
        <!-- Section Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                </svg>
                معرض الصور
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                صور من أعمالنا
            </h2>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($service->galleries as $gallery)
                <div class="group relative rounded-2xl overflow-hidden bg-gray-100 aspect-square cursor-pointer hover:shadow-2xl transition-all duration-500">
                    <img src="{{ $gallery->image_url }}" 
                         alt="{{ $gallery->title ?? 'صورة الخدمة' }}" 
                          class="w-full h-full object-fill transition-transform duration-700 group-hover:scale-110" 
             loading="lazy">
                    
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <!-- Zoom Icon -->
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500">
                        <div class="w-12 h-12 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center transform scale-50 group-hover:scale-100 transition-transform duration-500">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/>
                            </svg>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Related Posts Section -->
<section class="py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="container mx-auto px-4">
        
        <!-- Section Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/>
                    <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"/>
                </svg>
                مقالات مفيدة
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                مقالات ذات صلة
            </h2>
        </div>

        <!-- Posts Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($relatedPosts as $post)
                <a href="{{ route('blog.show',$post->slug) }}" 
                   class="group relative flex flex-col bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    
                    @if($post->image)
                        <div class="relative h-56 overflow-hidden bg-gray-100">
                            <img src="{{ $post->image }}" 
                             class="w-full h-full object-fill transition-transform duration-700 group-hover:scale-110" 
             loading="lazy"
                                 alt="{{ $post->title }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-500"></div>
                        </div>
                    @endif
                    
                    <div class="flex-1 p-6 flex flex-col">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-primary transition-colors duration-300 line-clamp-2">
                            {{ $post->title }}
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 flex-1 line-clamp-3">
                            {{ Str::limit(strip_tags($post->content), 120) }}
                        </p>
                        
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <span class="text-primary font-semibold text-sm group-hover:text-green-600 transition-colors duration-300">
                                اقرأ المزيد
                            </span>
                            <div class="w-8 h-8 rounded-full bg-primary/10 group-hover:bg-primary flex items-center justify-center transition-all duration-300">
                                <svg class="w-4 h-4 text-primary group-hover:text-white transition-all duration-300 transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="inline-flex items-center gap-3 px-6 py-4 rounded-2xl bg-gray-50 text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>لا توجد مقالات ذات صلة حالياً</span>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

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

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endpush
