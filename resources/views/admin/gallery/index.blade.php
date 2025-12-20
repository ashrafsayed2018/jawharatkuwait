@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12" dir="rtl">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">معرض الصور</h1>
        <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-900">عودة للوحة التحكم</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Upload Form -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h2 class="text-xl font-semibold mb-4">رفع صور جديدة</h2>
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="images">
                    اختر الصور (يمكنك اختيار أكثر من صورة)
                </label>
                <input type="file" name="images[]" id="images" multiple class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required accept="image/*">
                <p class="text-sm text-gray-500 mt-1">الحد الأقصى 5 ميجابايت لكل صورة. الصيغ المدعومة: jpeg, png, jpg, gif</p>
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                رفع الصور
            </button>
        </form>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($images as $image)
            <div class="bg-white rounded-lg shadow-md overflow-hidden relative group">
                <img src="{{ asset($image->image_path) }}" alt="{{ $image->title }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <p class="text-sm text-gray-600 truncate" title="{{ $image->title }}">{{ $image->title }}</p>
                </div>
                
                <!-- Delete Button (Overlay) -->
                <div class="absolute top-2 left-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <form action="{{ route('admin.gallery.destroy', $image) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذه الصورة؟');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white p-2 rounded-full shadow-lg" title="حذف">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 text-gray-500">
                لا توجد صور في المعرض حالياً.
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $images->links() }}
    </div>
</div>
@endsection
