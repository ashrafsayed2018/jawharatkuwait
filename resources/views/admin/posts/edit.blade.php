@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-7xl">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">تعديل مقال</h1>
            <p class="text-sm text-gray-500 mt-1">قم بتعديل بيانات المقال</p>
        </div>
        <a href="{{ route('admin.posts.index') }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors shadow-sm font-medium">
            إلغاء
        </a>
    </div>

    <form method="post" action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content (Right Side in RTL) -->
            <div class="lg:col-span-2 space-y-8">
                
                <!-- Basic Info Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                        <h2 class="text-lg font-semibold text-gray-800">بيانات المقال</h2>
                    </div>
                    <div class="p-6 space-y-6">
                        <!-- Title -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">عنوان المقال <span class="text-red-500">*</span></label>
                            <input type="text" name="title" value="{{ old('title', $post->title) }}" class="w-full px-4 py-3 rounded-lg border-gray-300 border focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors shadow-sm @error('title') border-red-500 @enderror" placeholder="اكتب عنوان المقال هنا..." required>
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">المحتوى <span class="text-red-500">*</span></label>
                            <textarea name="content" id="content" class="w-full rounded-lg border-gray-300 border shadow-sm @error('content') border-red-500 @enderror" rows="15">{{ old('content', $post->content) }}</textarea>
                            @error('content')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- SEO Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                        <h2 class="text-lg font-semibold text-gray-800">تحسين محركات البحث (SEO)</h2>
                    </div>
                    <div class="p-6 space-y-6">
                        <!-- Meta Title -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">عنوان الميتا (Meta Title)</label>
                            <input type="text" name="meta_title" value="{{ old('meta_title', $post->meta_title) }}" class="w-full px-4 py-3 rounded-lg border-gray-300 border focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors shadow-sm @error('meta_title') border-red-500 @enderror" placeholder="يترك فارغاً لاستخدام عنوان المقال">
                            @error('meta_title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-500 mt-1">العنوان الذي يظهر في نتائج البحث.</p>
                        </div>

                        <!-- Meta Description -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">وصف الميتا (Meta Description)</label>
                            <textarea name="meta_description" class="w-full px-4 py-3 rounded-lg border-gray-300 border focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors shadow-sm @error('meta_description') border-red-500 @enderror" rows="3" placeholder="وصف مختصر يظهر أسفل العنوان في نتائج البحث...">{{ old('meta_description', $post->meta_description) }}</textarea>
                            @error('meta_description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>

            <!-- Sidebar (Left Side in RTL) -->
            <div class="space-y-8">
                
                <!-- Publish Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                        <h2 class="text-lg font-semibold text-gray-800">النشر</h2>
                    </div>
                    <div class="p-6 space-y-6">
                        <!-- Publish Date -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">تاريخ النشر</label>
                            <input type="date" name="published_at" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d')) }}" class="w-full px-4 py-2 rounded-lg border-gray-300 border focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors shadow-sm">
                            <p class="text-xs text-gray-500 mt-1">اتركه فارغاً للنشر فوراً.</p>
                        </div>

                        <div class="pt-4 border-t border-gray-100">
                            <button type="submit" class="w-full py-3 px-4 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg shadow-sm transition-colors flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                </svg>
                                حفظ التعديلات
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Organization Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                        <h2 class="text-lg font-semibold text-gray-800">التصنيف والوسوم</h2>
                    </div>
                    <div class="p-6 space-y-6">
                        <!-- Service -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">الخدمة التابعة لها <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <select name="service_id" class="w-full pl-10 pr-4 py-3 rounded-lg border-gray-300 border focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors shadow-sm appearance-none bg-white @error('service_id') border-red-500 @enderror" required>
                                    <option value="">اختر الخدمة...</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ old('service_id', $post->service_id) == $service->id ? 'selected' : '' }}>{{ $service->title }}</option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center px-4 text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                            @error('service_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tags -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">الوسوم</label>
                            <div class="border border-gray-300 rounded-lg max-h-48 overflow-y-auto p-3 bg-white shadow-sm scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-transparent">
                                @if($tags->count() > 0)
                                    <div class="space-y-2">
                                        @foreach($tags as $tag)
                                            <label class="flex items-center p-2 rounded hover:bg-gray-50 cursor-pointer transition-colors select-none">
                                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                                                    class="w-4 h-4 text-green-600 rounded border-gray-300 focus:ring-green-500 ml-3"
                                                    {{ (is_array(old('tags')) && in_array($tag->id, old('tags'))) || $post->relatedTags->contains($tag->id) ? 'checked' : '' }}>
                                                <span class="text-gray-700 text-sm">{{ $tag->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-sm text-gray-400 text-center py-4">لا توجد وسوم متاحة</p>
                                @endif
                            </div>
                            <p class="text-xs text-gray-500 mt-2">اختر الوسوم المناسبة للمقال.</p>
                        </div>
                    </div>
                </div>

                <!-- Featured Image Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                        <h2 class="text-lg font-semibold text-gray-800">الصورة البارزة</h2>
                    </div>
                    <div class="p-6">
                        <input type="text" name="gallery_id" id="gallery_id" value="{{ old('gallery_id', $post->gallery_id) }}" class="opacity-0 h-0 w-0 absolute">
                        
                        <div id="image_preview_container" class="space-y-4">
                            <!-- Placeholder -->
                            <div id="image_placeholder" class="border-2 border-dashed {{ $errors->has('gallery_id') ? 'border-red-300 bg-red-50' : 'border-gray-300' }} rounded-xl p-8 text-center hover:border-green-500 hover:bg-green-50 transition-all cursor-pointer group {{ $post->image ? 'hidden' : '' }}" onclick="openGalleryPicker()">
                                <div class="w-16 h-16 bg-gray-100 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-white group-hover:text-green-500 transition-colors">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-sm font-medium text-gray-900">اضغط لاختيار صورة</h3>
                                <p class="text-xs text-gray-500 mt-1">اختر صورة عالية الجودة من المعرض</p>
                            </div>

                            @error('gallery_id')
                                <p class="text-red-500 text-xs mt-1 text-center">يرجى اختيار صورة للمقال</p>
                            @enderror

                            <!-- Preview -->
                            <div id="image_preview" class="{{ $post->image ? '' : 'hidden' }} relative group rounded-xl overflow-hidden border border-gray-200 shadow-sm">
                                <img src="{{ $post->image }}" class="w-full h-48 object-cover">
                                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-3">
                                    <button type="button" onclick="openGalleryPicker()" class="p-2 bg-white text-gray-800 rounded-full hover:bg-gray-100 transition-colors" title="تغيير الصورة">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                        </svg>
                                    </button>
                                    <button type="button" onclick="clearGallerySelection()" class="p-2 bg-red-500 text-white rounded-full hover:bg-red-600 transition-colors" title="إزالة الصورة">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>

<!-- Gallery Picker Modal -->
<div id="galleryModal" class="fixed inset-0 z-[60] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-gray-900/75 transition-opacity backdrop-blur-sm" onclick="closeGalleryPicker()"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-right shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl h-[85vh] flex flex-col">
                
                <!-- Header -->
                <div class="bg-white px-6 py-4 border-b border-gray-100 flex justify-between items-center shrink-0">
                    <h3 class="text-xl font-bold text-gray-900" id="modal-title">معرض الصور</h3>
                    <button type="button" onclick="closeGalleryPicker()" class="text-gray-400 hover:text-gray-500 focus:outline-none p-2 rounded-lg hover:bg-gray-100 transition-colors">
                        <span class="sr-only">إغلاق</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Grid Content -->
                <div id="galleryGrid" class="flex-1 overflow-y-auto p-6 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 bg-gray-50">
                    <!-- Images will be loaded here -->
                    <div class="col-span-full flex flex-col items-center justify-center text-gray-500 py-12">
                        <svg class="animate-spin h-8 w-8 text-green-500 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>جاري تحميل الصور...</span>
                    </div>
                </div>

                <!-- Footer -->
                <div class="bg-white px-6 py-4 border-t border-gray-100 flex justify-between items-center shrink-0">
                    <div id="galleryPagination" class="flex gap-2">
                        <!-- Pagination buttons -->
                    </div>
                    <button type="button" onclick="closeGalleryPicker()" class="inline-flex w-full justify-center rounded-lg bg-white px-4 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto transition-colors">إغلاق</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let currentPage = 1;

function openGalleryPicker() {
    document.getElementById('galleryModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden'; // Prevent body scroll
    loadGalleryImages(currentPage);
}

function closeGalleryPicker() {
    document.getElementById('galleryModal').classList.add('hidden');
    document.body.style.overflow = ''; // Restore body scroll
}

function loadGalleryImages(page) {
    fetch(`{{ route('admin.gallery.api') }}?page=${page}`)
        .then(response => response.json())
        .then(data => {
            const grid = document.getElementById('galleryGrid');
            grid.innerHTML = '';
            
            if(data.data.length === 0) {
                grid.innerHTML = `
                    <div class="col-span-full flex flex-col items-center justify-center text-gray-500 py-12">
                        <svg class="w-12 h-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="text-lg font-medium">لا توجد صور في المعرض</span>
                        <a href="{{ route('admin.gallery.index') }}" class="mt-2 text-green-600 hover:underline text-sm">إضافة صور جديدة</a>
                    </div>
                `;
                return;
            }
            
            data.data.forEach(image => {
                const div = document.createElement('div');
                div.className = 'relative group cursor-pointer rounded-xl overflow-hidden aspect-square border border-gray-200 shadow-sm hover:shadow-md transition-all bg-white';
                div.onclick = () => selectImage(image);
                
                div.innerHTML = `
                    <img src="${image.image_url}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" loading="lazy">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center backdrop-blur-[1px]">
                        <span class="bg-white text-gray-900 px-4 py-2 rounded-full text-sm font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-transform">اختيار</span>
                    </div>
                `;
                grid.appendChild(div);
            });
            
            updatePagination(data);
        })
        .catch(error => {
            const grid = document.getElementById('galleryGrid');
            grid.innerHTML = `
                <div class="col-span-full text-center text-red-500 py-12">
                    حدث خطأ أثناء تحميل الصور. يرجى المحاولة مرة أخرى.
                </div>
            `;
        });
}

function updatePagination(data) {
    const container = document.getElementById('galleryPagination');
    container.innerHTML = '';
    
    if (data.prev_page_url) {
        const prevBtn = document.createElement('button');
        prevBtn.innerText = 'السابق';
        prevBtn.className = 'px-3 py-1 bg-white border border-gray-300 rounded hover:bg-gray-50 text-sm font-medium';
        prevBtn.onclick = () => {
            currentPage--;
            loadGalleryImages(currentPage);
        };
        container.appendChild(prevBtn);
    }
    
    if (data.next_page_url) {
        const nextBtn = document.createElement('button');
        nextBtn.innerText = 'التالي';
        nextBtn.className = 'px-3 py-1 bg-white border border-gray-300 rounded hover:bg-gray-50 text-sm font-medium';
        nextBtn.onclick = () => {
            currentPage++;
            loadGalleryImages(currentPage);
        };
        container.appendChild(nextBtn);
    }
}

function selectImage(image) {
    document.getElementById('gallery_id').value = image.id;
    const imgPreview = document.querySelector('#image_preview img');
    imgPreview.src = image.image_url;
    
    document.getElementById('image_placeholder').classList.add('hidden');
    document.getElementById('image_preview').classList.remove('hidden');
    
    closeGalleryPicker();
}

function clearGallerySelection() {
    document.getElementById('gallery_id').value = '';
    document.getElementById('image_preview').classList.add('hidden');
    document.getElementById('image_placeholder').classList.remove('hidden');
    document.querySelector('#image_preview img').src = '';
}
</script>
@endsection
