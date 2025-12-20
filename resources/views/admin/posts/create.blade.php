@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-2xl font-bold">إضافة مقال</h1>
    <form method="post" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data" class="grid md:grid-cols-2 gap-4 mt-6">
        @csrf
        
        <!-- Title -->
        <div class="md:col-span-2">
            <label class="block text-gray-700 text-sm font-bold mb-2">العنوان</label>
            <input name="title" class="border p-3 rounded w-full" placeholder="العنوان" required>
        </div>

        <!-- Service -->
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">الخدمة التابعة لها</label>
            <select name="service_id" class="border p-3 rounded w-full" required>
                <option value="">اختر خدمة</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tags -->
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">الوسوم</label>
            <select name="tags[]" multiple class="border p-3 rounded w-full h-32">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            <p class="text-xs text-gray-500 mt-1">اضغط Ctrl (أو Cmd) لتحديد عدة وسوم</p>
        </div>

        <!-- Image -->
        <div class="md:col-span-2">
            <label class="block text-gray-700 text-sm font-bold mb-2">صورة المقال</label>
            <div class="flex gap-4 items-center mb-2">
                <button type="button" onclick="openGalleryPicker()" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded">اختر من المعرض</button>
            </div>
            <input type="text" name="gallery_id" id="gallery_id" class="opacity-0 h-0 w-0 absolute" required>
            <div id="image_preview" class="hidden mt-2">
                <img src="" class="h-32 w-auto rounded border object-cover">
                <button type="button" onclick="clearGallerySelection()" class="text-sm text-red-500 mt-1">إزالة الصورة المختارة</button>
            </div>
        </div>

        <!-- Content -->
        <div class="md:col-span-2">
            <label class="block text-gray-700 text-sm font-bold mb-2">المحتوى</label>
            <textarea name="content" class="border p-3 rounded w-full" rows="8" placeholder="المحتوى" required></textarea>
        </div>

        <!-- Meta & Date -->
        <input name="published_at" type="date" class="border p-3 rounded" placeholder="تاريخ النشر">
        <input name="meta_title" class="border p-3 rounded" placeholder="عنوان ميتا">
        <input name="meta_description" class="border p-3 rounded md:col-span-2" placeholder="وصف ميتا">

        <button class="px-5 py-3 bg-primary text-white rounded md:col-span-2 hover:bg-primary-dark">حفظ</button>
    </form>
</div>

<!-- Gallery Picker Modal -->
<div id="galleryModal" class="fixed inset-0 z-[60] hidden bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white w-full max-w-4xl max-h-[90vh] rounded-lg shadow-lg flex flex-col p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold">اختر صورة من المعرض</h3>
            <button onclick="closeGalleryPicker()" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <div id="galleryGrid" class="flex-1 overflow-y-auto grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4 p-2">
            <!-- Images will be loaded here -->
            <p class="col-span-full text-center text-gray-500">جاري تحميل الصور...</p>
        </div>
        
        <div class="mt-4 pt-4 border-t flex justify-between items-center">
            <div id="galleryPagination" class="flex gap-2">
                <!-- Pagination buttons -->
            </div>
            <div class="flex gap-2">
                <button onclick="closeGalleryPicker()" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<script>
let currentPage = 1;

function openGalleryPicker() {
    document.getElementById('galleryModal').classList.remove('hidden');
    loadGalleryImages(currentPage);
}

function closeGalleryPicker() {
    document.getElementById('galleryModal').classList.add('hidden');
}

function loadGalleryImages(page) {
    fetch(`{{ route('admin.gallery.api') }}?page=${page}`)
        .then(response => response.json())
        .then(data => {
            const grid = document.getElementById('galleryGrid');
            grid.innerHTML = '';
            
            data.data.forEach(image => {
                const div = document.createElement('div');
                div.className = 'relative group cursor-pointer border rounded overflow-hidden aspect-square';
                div.onclick = () => selectImage(image);
                
                div.innerHTML = `
                    <img src="${image.image_url}" class="w-full h-full object-cover hover:scale-105 transition-transform">
                    <div class="absolute inset-0 bg-opacity-0 group-hover:bg-opacity-20 transition-all flex items-center justify-center">
                        <span class="text-white opacity-0 group-hover:opacity-100 font-bold">اختيار</span>
                    </div>
                `;
                grid.appendChild(div);
            });
            
            updatePagination(data);
        });
}

function updatePagination(data) {
    const container = document.getElementById('galleryPagination');
    container.innerHTML = '';
    
    if (data.prev_page_url) {
        const prevBtn = document.createElement('button');
        prevBtn.innerText = 'السابق';
        prevBtn.className = 'px-3 py-1 bg-gray-100 rounded hover:bg-gray-200';
        prevBtn.onclick = () => {
            currentPage--;
            loadGalleryImages(currentPage);
        };
        container.appendChild(prevBtn);
    }
    
    if (data.next_page_url) {
        const nextBtn = document.createElement('button');
        nextBtn.innerText = 'التالي';
        nextBtn.className = 'px-3 py-1 bg-gray-100 rounded hover:bg-gray-200';
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
    document.getElementById('image_preview').classList.remove('hidden');
    
    closeGalleryPicker();
}

function clearGallerySelection() {
    document.getElementById('gallery_id').value = '';
    document.getElementById('image_preview').classList.add('hidden');
    document.querySelector('#image_preview img').src = '';
}
</script>
@endsection
