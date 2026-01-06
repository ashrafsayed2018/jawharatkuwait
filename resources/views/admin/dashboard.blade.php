@extends('layouts.admin')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-800">لوحة التحكم</h1>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Users -->
    <x-admin.stat-card title="المستخدمين" :count="$userCount" color="#a855f7" :link="route('admin.users.index')">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
        </svg>
    </x-admin.stat-card>

    <!-- Tags -->
    <x-admin.stat-card title="الوسوم" :count="$tagCount" color="#eab308" :link="route('admin.tags.index')">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
        </svg>
    </x-admin.stat-card>

    <!-- Posts -->
    <x-admin.stat-card title="المقالات" :count="$postCount" color="#10b981" :link="route('admin.posts.index')">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
        </svg>
    </x-admin.stat-card>

    <!-- Services (Sections) -->
    <x-admin.stat-card title="الأقسام" :count="$serviceCount" color="#3b82f6" :link="route('admin.services.index')">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
        </svg>
    </x-admin.stat-card>
</div>

<!-- Bottom Sections -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Latest Posts -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-bold text-gray-800">آخر المقالات</h3>
            <a href="{{ route('admin.posts.index') }}" class="text-green-600 text-sm hover:underline">عرض الكل</a>
        </div>

        @if($latestPosts->count() > 0)
            <div class="space-y-4">
                @foreach($latestPosts as $post)
                    <div class="flex items-center gap-4 border-b pb-4 last:border-0">
                        @if($post->image)
                            <img src="{{ $post->image }}" class="w-12 h-12 rounded object-cover" alt="">
                        @else
                            <div class="w-12 h-12 rounded bg-gray-100 flex items-center justify-center text-gray-400">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-800">{{ $post->title }}</h4>
                            <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-8 text-gray-500">
                لا توجد مقالات مضافة مؤخراً
            </div>
        @endif
    </div>

    <!-- Scheduled Posts -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-bold text-gray-800">مقالات مجدولة للنشر</h3>
            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">القادمة</span>
        </div>
        
        @if($scheduledPosts->count() > 0)
            <div class="space-y-4">
                @foreach($scheduledPosts as $post)
                    <div class="flex items-center gap-4 border-b pb-4 last:border-0">
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-800">{{ $post->title }}</h4>
                            <p class="text-sm text-gray-500">{{ $post->published_at->format('Y-m-d H:i') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-8 text-gray-500">
                لا توجد مقالات مجدولة حالياً
            </div>
        @endif
    </div>
</div>
@endsection