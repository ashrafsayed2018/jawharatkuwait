@extends('layouts.app')

@section('title', 'معرض الصور - جوهرة الكويت')
@section('meta_description', 'تصفح معرض صور جوهرة الكويت للاطلاع على أحدث أعمالنا وخدماتنا في الضيافة وتأجير الخيام.')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-4 py-28">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">معرض الصور</h1>
            <p class="text-xl text-gray-600">لمحات من أعمالنا وخدماتنا المميزة</p>
            <div class="w-24 h-1 bg-primary mx-auto mt-4"></div>
        </div>

        <form action="{{ route('gallery.index') }}" method="GET" class="max-w-xl mx-auto mb-12 px-4 sm:px-0">
            <div class="relative flex items-center bg-white rounded-2xl shadow-lg border border-gray-100 focus-within:ring-2 focus-within:ring-primary transition-all duration-300">
                <div class="flex items-center justify-center ps-5 text-gray-400 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="search" value="{{ $search }}" placeholder="ابحث عن صورة..."
                       class="w-full py-4 px-3 bg-transparent rounded-2xl focus:outline-none text-gray-700 placeholder:text-gray-400">
                @if($search)
                    <a href="{{ route('gallery.index') }}" class="flex items-center justify-center pe-5 text-gray-400 hover:text-gray-600 shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                @endif
                <button type="submit" class="me-1.5 my-1.5 px-6 py-2.5 rounded-xl font-medium text-sm text-white bg-linear-to-r from-primary to-green-500 hover:shadow-md transition-all duration-300 shrink-0">
                    بحث
                </button>
            </div>
        </form>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" id="gallery-grid">
            @forelse($images as $image)
                <div class="relative group overflow-hidden rounded-lg shadow-lg cursor-pointer transition-transform duration-300 hover:scale-[1.02]" onclick="openLightbox('{{ $image->image_url }}', '{{ $image->title }}')">
                    <img src="{{ $image->image_url }}" alt="{{ $image->title }}" class="w-full object-fill transform transition-transform duration-500 group-hover:scale-110" style="height:500px;">
                    <div class="absolute inset-0 group-hover:bg-opacity-30 transition-opacity duration-300 flex items-center justify-center">
                        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                            </svg>
                        </div>
                    </div>
                    @auth
                        <button type="button" onclick="copyImageUrl(event, '{{ $image->image_url }}')"
                                title="نسخ رابط الصورة"
                                class="absolute top-2 left-2 z-10 bg-white/90 hover:bg-white text-gray-700 hover:text-primary rounded-lg p-2 shadow-md transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                        </button>
                    @endauth
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <div class="text-gray-400 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <p class="text-xl text-gray-500">
                        @if($search)
                            لا توجد نتائج بحث عن "{{ $search }}".
                        @else
                            لا توجد صور في المعرض حالياً.
                        @endif
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Copy Toast -->
<div id="copy-toast" class="fixed bottom-6 left-1/2 -translate-x-1/2 z-60 bg-gray-900 text-white px-5 py-3 rounded-xl shadow-lg flex items-center gap-2 opacity-0 pointer-events-none transition-all duration-300 translate-y-4">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
    </svg>
    <span>تم نسخ رابط الصورة</span>
</div>

<!-- Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 z-50 hidden bg-black bg-opacity-90 flex items-center justify-center p-4" onclick="closeLightbox()">
    <button class="absolute top-4 right-4 text-white hover:text-gray-300 focus:outline-none" onclick="closeLightbox()">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    <div class="relative max-w-4xl max-h-screen w-full" onclick="event.stopPropagation()">
        <img id="lightbox-img" src="" alt="" class="w-full h-auto max-h-[90vh] object-contain mx-auto rounded-lg">
        <p id="lightbox-caption" class="text-white text-center mt-4 text-lg font-semibold"></p>
    </div>
</div>

<script>
    function openLightbox(src, title) {
        document.getElementById('lightbox-img').src = src;
        document.getElementById('lightbox-caption').textContent = title;
        document.getElementById('lightbox').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        document.getElementById('lightbox').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Close on escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            closeLightbox();
        }
    });

    function copyImageUrl(event, url) {
        event.stopPropagation();

        const showToast = () => {
            const toast = document.getElementById('copy-toast');
            toast.classList.remove('opacity-0', 'translate-y-4', 'pointer-events-none');
            clearTimeout(window.__copyToastTimeout);
            window.__copyToastTimeout = setTimeout(() => {
                toast.classList.add('opacity-0', 'translate-y-4', 'pointer-events-none');
            }, 2000);
        };

        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(url).then(showToast);
        } else {
            const textarea = document.createElement('textarea');
            textarea.value = url;
            textarea.style.position = 'fixed';
            textarea.style.opacity = '0';
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
            showToast();
        }
    }
</script>

<livewire:rating-widget />
@endsection
