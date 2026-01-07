@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">إدارة المقالات</h1>
        <a href="{{ route('admin.posts.create') }}" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow transition-colors flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>إضافة مقال جديد</span>
        </a>
    </div>

    <!-- Stats/Tabs -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-1 mb-6 inline-flex">
        <a href="{{ route('admin.posts.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ !request('status') ? 'bg-green-50 text-green-700' : 'text-gray-500 hover:text-gray-700' }}">
            الكل
        </a>
        <a href="{{ route('admin.posts.index', ['status' => 'archived']) }}" class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ request('status') === 'archived' ? 'bg-red-50 text-red-700' : 'text-gray-500 hover:text-gray-700' }}">
            الأرشيف (المحذوفة)
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-md shadow-sm">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-right">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">العنوان</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">الخدمة</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">تاريخ النشر</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">الحالة</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($posts as $post)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                @if($post->image)
                                    <img src="{{ asset($post->image) }}" class="w-10 h-10 rounded-lg object-cover border border-gray-200" alt="">
                                @else
                                    <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center text-gray-400">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div>
                                    <a href="{{ route('post.show', $post->slug) }}" target="_blank" class="text-sm font-medium text-gray-900 hover:text-green-600 transition-colors block">
                                        {{ \Illuminate\Support\Str::limit($post->title, 40) }}
                                    </a>
                                    <div class="text-xs text-gray-500">{{ $post->slug }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($post->service)
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700">
                                    {{ $post->service->title }}
                                </span>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-600">
                                {{ $post->published_at ? $post->published_at->format('Y/m/d') : 'مسودة' }}
                            </div>
                            @if(!$post->published_at)
                                <span class="text-xs text-yellow-600">غير منشور</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($post->trashed())
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    محذوف
                                </span>
                            @else
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    نشط
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center gap-2">
                                @if($post->trashed())
                                    <!-- Restore -->
                                    <form action="{{ route('admin.posts.restore', $post->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="p-1 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded transition-colors" title="استعادة">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                            </svg>
                                        </button>
                                    </form>
                                    
                                    <!-- Force Delete -->
                                    <form action="{{ route('admin.posts.forceDelete', $post->id) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت متأكد من الحذف النهائي؟ لا يمكن التراجع عن هذا الإجراء.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1 text-red-600 hover:text-red-800 hover:bg-red-50 rounded transition-colors" title="حذف نهائي">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                @else
                                    <!-- Edit -->
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="p-1 text-gray-600 hover:text-green-600 hover:bg-green-50 rounded transition-colors" title="تعديل">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>

                                    <!-- Soft Delete -->
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت متأكد من نقل المقال للأرشيف؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1 text-red-600 hover:text-red-800 hover:bg-red-50 rounded transition-colors" title="أرشفة">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                                <span class="text-lg font-medium">لا توجد مقالات</span>
                                @if(request('status') !== 'archived')
                                    <a href="{{ route('admin.posts.create') }}" class="mt-2 text-green-600 hover:underline text-sm">إضافة مقال جديد</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-100">
            {{ $posts->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection