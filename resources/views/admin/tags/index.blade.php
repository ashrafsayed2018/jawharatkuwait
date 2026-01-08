@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-28">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">إدارة الوسوم</h1>
        <button onclick="document.getElementById('createModal').classList.remove('hidden')" class="px-4 py-2 bg-primary text-white rounded">إضافة وسم</button>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">الصورة</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">الاسم</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">الرابط (Slug)</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">عدد المقالات</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">إجراءات</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($tags as $tag)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($tag->gallery)
                            <img src="{{ $tag->gallery->image_url }}" class="h-10 w-10 rounded object-cover">
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $tag->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{ $tag->slug }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $tag->posts_count }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="flex items-center gap-1 text-sm text-gray-600">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            {{ $tag->views }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button onclick="editTag({{ $tag->id }}, '{{ $tag->name }}', '{{ $tag->gallery ? $tag->gallery->image_url : '' }}', '{{ $tag->gallery_id }}')" class="text-indigo-600 hover:text-indigo-900 ml-3">تعديل</button>
                        <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا الوسم؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $tags->links() }}
    </div>
</div>

<!-- Create Modal -->
<div id="createModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">إضافة وسم جديد</h3>
            <form action="{{ route('admin.tags.store') }}" method="POST" class="mt-4 text-right">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">اسم الوسم</label>
                    <input type="text" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">صورة الوسم</label>
                    <div class="flex gap-2 items-center">
                        <button type="button" onclick="openGalleryPicker('single', 'create')" class="bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded text-sm">اختر من المعرض</button>
                        <input type="hidden" name="gallery_id" id="create_gallery_id">
                    </div>
                    <div id="create_image_preview" class="mt-2 hidden">
                        <img src="" class="h-16 w-16 rounded border object-cover">
                        <button type="button" onclick="clearGallerySelection('create')" class="text-xs text-red-500 mt-1">إزالة</button>
                    </div>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" onclick="document.getElementById('createModal').classList.add('hidden')" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">إلغاء</button>
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded hover:bg-primary-dark">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">تعديل وسم</h3>
            <form id="editForm" method="POST" class="mt-4 text-right">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">اسم الوسم</label>
                    <input type="text" id="editName" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">صورة الوسم</label>
                    <div class="flex gap-2 items-center">
                        <button type="button" onclick="openGalleryPicker('single', 'edit')" class="bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded text-sm">اختر من المعرض</button>
                        <input type="hidden" name="gallery_id" id="edit_gallery_id">
                    </div>
                    <div id="edit_image_preview" class="mt-2 hidden">
                        <img src="" id="edit_image_img" class="h-16 w-16 rounded border object-cover">
                        <button type="button" onclick="clearGallerySelection('edit')" class="text-xs text-red-500 mt-1">إزالة</button>
                    </div>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" onclick="document.getElementById('editModal').classList.add('hidden')" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">إلغاء</button>
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded hover:bg-primary-dark">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>

    </div>
</div>

<!-- Gallery Picker Modal -->
<div id="galleryModal" class="fixed inset-0 z-[60] hidden  bg-opacity-50 flex items-center justify-center">
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
let currentFormContext = 'create'; // 'create' or 'edit'

function editTag(id, name, imageUrl, galleryId) {
    document.getElementById('editForm').action = "/admin/tags/" + id;
    document.getElementById('editName').value = name;
    
    // Set initial image if exists
    if (galleryId && imageUrl) {
        document.getElementById('edit_gallery_id').value = galleryId;
        document.getElementById('edit_image_img').src = imageUrl;
        document.getElementById('edit_image_preview').classList.remove('hidden');
    } else {
        clearGallerySelection('edit');
    }
    
    document.getElementById('editModal').classList.remove('hidden');
}

function openGalleryPicker(mode, context) {
    currentFormContext = context;
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
    const prefix = currentFormContext; // 'create' or 'edit'
    
    document.getElementById(`${prefix}_gallery_id`).value = image.id;
    const imgPreview = document.querySelector(`#${prefix}_image_preview img`);
    imgPreview.src = image.image_url;
    document.getElementById(`${prefix}_image_preview`).classList.remove('hidden');
    
    closeGalleryPicker();
}

function clearGallerySelection(context) {
    document.getElementById(`${context}_gallery_id`).value = '';
    document.getElementById(`${context}_image_preview`).classList.add('hidden');
    document.querySelector(`#${context}_image_preview img`).src = '';
}
</script>
@endsection
