@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-2xl font-bold">إضافة خدمة</h1>
    <form method="post" action="{{ route('admin.services.store') }}" enctype="multipart/form-data" class="grid md:grid-cols-2 gap-4 mt-6">
        @csrf
        <input name="title" class="border p-3 rounded" placeholder="العنوان" required>
        
        <!-- Image Upload with Gallery Picker -->
        <div class="border p-3 rounded">
            <label class="block mb-2 text-sm text-gray-600">صورة الخدمة الرئيسية</label>
            <div class="flex gap-2">
                <input type="file" name="image" class="w-full" onchange="clearGallerySelection()">
                <button type="button" onclick="openGalleryPicker('single')" class="bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded text-sm">اختر من المعرض</button>
            </div>
            <input type="hidden" name="image_url" id="selected_image_url">
            <div id="image_preview" class="mt-2 hidden">
                <p class="text-xs text-green-600 mb-1">تم اختيار صورة من المعرض:</p>
                <img src="" class="h-20 w-auto rounded border">
                <button type="button" onclick="clearGallerySelection()" class="text-xs text-red-500 mt-1">إلغاء</button>
            </div>
        </div>

        <!-- Service Gallery -->
        <div class="border p-3 rounded md:col-span-2">
            <label class="block mb-2 text-sm text-gray-600">معرض صور الخدمة (إضافي)</label>
            <div class="flex gap-2 mb-2">
                <button type="button" onclick="openGalleryPicker('multiple')" class="bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded text-sm">إضافة صور من المعرض</button>
            </div>
            <div id="service_gallery_preview" class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-2"></div>
            <div id="gallery_ids_container"></div>
        </div>

        <textarea name="short_description" class="border p-3 rounded" rows="3" placeholder="نبذة"></textarea>
        <textarea name="long_description" class="border p-3 rounded md:col-span-2" rows="6" placeholder="التفاصيل"></textarea>
        <input name="meta_title" class="border p-3 rounded" placeholder="عنوان ميتا">
        <input name="meta_description" class="border p-3 rounded" placeholder="وصف ميتا">
        <label class="flex items-center gap-2"><input type="checkbox" name="is_active" value="1" checked> نشط</label>
        <button class="px-5 py-3 bg-primary text-white rounded md:col-span-2">حفظ</button>
    </form>
</div>

<!-- Gallery Picker Modal -->
<div id="galleryModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
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
                <button id="galleryConfirmBtn" onclick="confirmGallerySelection()" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark hidden">تأكيد الاختيار</button>
                <button onclick="closeGalleryPicker()" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<script>
    let currentPage = 1;
    let pickerMode = 'single';
    let selectedGalleryItems = [];

    function openGalleryPicker(mode = 'single') {
        pickerMode = mode;
        document.getElementById('galleryModal').classList.remove('hidden');
        
        const confirmBtn = document.getElementById('galleryConfirmBtn');
        if (mode === 'multiple') {
            confirmBtn.classList.remove('hidden');
        } else {
            confirmBtn.classList.add('hidden');
        }
        
        loadGalleryImages(currentPage);
    }
    
    function closeGalleryPicker() {
        document.getElementById('galleryModal').classList.add('hidden');
        if (pickerMode === 'multiple') {
            selectedGalleryItems = []; // Reset if closed without confirming? Or keep? Reset is safer for now.
        }
    }
    
    function loadGalleryImages(page) {
        fetch(`{{ route('admin.gallery.api') }}?page=${page}`)
            .then(response => response.json())
            .then(data => {
                const grid = document.getElementById('galleryGrid');
                grid.innerHTML = '';
                
                if (data.data.length === 0) {
                    grid.innerHTML = '<p class="col-span-full text-center text-gray-500">لا توجد صور في المعرض</p>';
                    return;
                }
                
                data.data.forEach(image => {
                    const div = document.createElement('div');
                    const isSelected = selectedGalleryItems.some(item => item.id === image.id);
                    
                    div.className = `cursor-pointer border rounded relative group h-32 overflow-hidden ${isSelected ? 'border-4 border-blue-500' : 'hover:border-blue-500'}`;
                    div.onclick = () => handleImageClick(image);
                    
                    div.innerHTML = `
                        <img src="${image.image_url}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 group-hover:bg-opacity-20 transition-all flex items-center justify-center">
                            <span class="text-white opacity-0 group-hover:opacity-100 font-bold text-sm bg-black/50 px-2 py-1 rounded">
                                ${pickerMode === 'multiple' && isSelected ? 'إلغاء' : 'اختيار'}
                            </span>
                        </div>
                        ${pickerMode === 'multiple' && isSelected ? '<div class="absolute top-1 right-1 bg-blue-500 text-white rounded-full p-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></div>' : ''}
                    `;
                    grid.appendChild(div);
                });
                
                renderPagination(data);
            });
    }

    function handleImageClick(image) {
        if (pickerMode === 'single') {
            selectGalleryImageSingle(image.image_url);
        } else {
            const index = selectedGalleryItems.findIndex(item => item.id === image.id);
            if (index === -1) {
                selectedGalleryItems.push({id: image.id, url: image.image_url});
            } else {
                selectedGalleryItems.splice(index, 1);
            }
            loadGalleryImages(currentPage); // Re-render to show selection
        }
    }

    function renderPagination(data) {
        const pagination = document.getElementById('galleryPagination');
        pagination.innerHTML = '';
        
        if (data.prev_page_url) {
            const prev = document.createElement('button');
            prev.innerText = 'السابق';
            prev.className = 'px-3 py-1 border rounded hover:bg-gray-100';
            prev.onclick = () => { currentPage--; loadGalleryImages(currentPage); };
            pagination.appendChild(prev);
        }
        
        if (data.next_page_url) {
            const next = document.createElement('button');
            next.innerText = 'التالي';
            next.className = 'px-3 py-1 border rounded hover:bg-gray-100';
            next.onclick = () => { currentPage++; loadGalleryImages(currentPage); };
            pagination.appendChild(next);
        }
    }
    
    function selectGalleryImageSingle(url) {
        document.getElementById('selected_image_url').value = url;
        const preview = document.getElementById('image_preview');
        preview.classList.remove('hidden');
        preview.querySelector('img').src = url;
        document.querySelector('input[name="image"]').value = '';
        closeGalleryPicker();
    }
    
    function clearGallerySelection() {
        document.getElementById('selected_image_url').value = '';
        document.getElementById('image_preview').classList.add('hidden');
        document.getElementById('image_preview').querySelector('img').src = '';
    }

    function confirmGallerySelection() {
        const container = document.getElementById('service_gallery_preview');
        const idsContainer = document.getElementById('gallery_ids_container');
        
        selectedGalleryItems.forEach(item => {
            if (!document.querySelector(`input[name="gallery_ids[]"][value="${item.id}"]`)) {
                const div = document.createElement('div');
                div.className = 'relative group border rounded h-24 w-full overflow-hidden';
                div.innerHTML = `
                    <img src="${item.url}" class="w-full h-full object-cover">
                    <button type="button" onclick="this.parentElement.remove(); removeGalleryId(${item.id})" class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                `;
                container.appendChild(div);

                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'gallery_ids[]';
                input.value = item.id;
                idsContainer.appendChild(input);
            }
        });

        closeGalleryPicker();
        selectedGalleryItems = [];
    }
    
    function removeGalleryId(id) {
         const input = document.querySelector(`input[name="gallery_ids[]"][value="${id}"]`);
         if(input) input.remove();
    }
</script>
@endsection
