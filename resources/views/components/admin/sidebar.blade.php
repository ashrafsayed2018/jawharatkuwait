<aside class="w-full h-full bg-[#111827] text-gray-300 flex flex-col">
    <!-- Header -->
    <div class="h-16 flex items-center justify-center border-b border-gray-800 bg-[#111827]">
        <h1 class="text-xl font-bold text-green-500">لوحة التحكم</h1>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-4">
        <ul class="space-y-1">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center px-6 py-3 hover:bg-gray-800 hover:text-white transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-white border-r-4 border-green-500' : '' }}">
                    <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span>الرئيسية</span>
                </a>
            </li>

            <!-- Content Management Section -->
            <li class="px-6 pt-6 pb-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                إدارة المحتوى
            </li>

            <!-- Services (Sections) -->
            <li>
                <a href="{{ route('admin.services.index') }}" 
                   class="flex items-center px-6 py-3 hover:bg-gray-800 hover:text-white transition-colors {{ request()->routeIs('admin.services.*') ? 'bg-gray-800 text-white border-r-4 border-green-500' : '' }}">
                    <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <span>الأقسام</span>
                </a>
            </li>

            <!-- Posts -->
            <li>
                <a href="{{ route('admin.posts.index') }}" 
                   class="flex items-center px-6 py-3 hover:bg-gray-800 hover:text-white transition-colors {{ request()->routeIs('admin.posts.*') ? 'bg-gray-800 text-white border-r-4 border-green-500' : '' }}">
                    <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    <span>المقالات</span>
                </a>
            </li>

            <!-- Tags -->
            <li>
                <a href="{{ route('admin.tags.index') }}" 
                   class="flex items-center px-6 py-3 hover:bg-gray-800 hover:text-white transition-colors {{ request()->routeIs('admin.tags.*') ? 'bg-gray-800 text-white border-r-4 border-green-500' : '' }}">
                    <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    <span>الوسوم</span>
                </a>
            </li>

             <!-- Messages (Keeping it as it's useful, though not in screenshot) -->
             <li>
                <a href="{{ route('admin.messages.index') }}" 
                   class="flex items-center px-6 py-3 hover:bg-gray-800 hover:text-white transition-colors {{ request()->routeIs('admin.messages.*') ? 'bg-gray-800 text-white border-r-4 border-green-500' : '' }}">
                    <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span>الرسائل</span>
                </a>
            </li>

            <!-- Media Section -->
            <li class="px-6 pt-6 pb-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                الوسائط
            </li>

            <!-- Gallery -->
            <li>
                <a href="{{ route('admin.gallery.index') }}" 
                   class="flex items-center px-6 py-3 hover:bg-gray-800 hover:text-white transition-colors {{ request()->routeIs('admin.gallery.*') ? 'bg-gray-800 text-white border-r-4 border-green-500' : '' }}">
                    <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span>معرض الصور</span>
                </a>
            </li>

            <!-- Users & Permissions Section -->
            <li class="px-6 pt-6 pb-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                المستخدمين والصلاحيات
            </li>

            <!-- Users -->
            <li>
                <a href="{{ route('admin.users.index') }}" 
                   class="flex items-center px-6 py-3 hover:bg-gray-800 hover:text-white transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-gray-800 text-white border-r-4 border-green-500' : '' }}">
                    <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <span>المستخدمين</span>
                </a>
            </li>

            <!-- Roles -->
            <li>
                <a href="{{ route('admin.roles.index') }}" 
                   class="flex items-center px-6 py-3 hover:bg-gray-800 hover:text-white transition-colors {{ request()->routeIs('admin.roles.*') ? 'bg-gray-800 text-white border-r-4 border-green-500' : '' }}">
                    <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <span>الأدوار</span>
                </a>
            </li>

             <!-- Settings Section -->
             <li class="px-6 pt-6 pb-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                الإعدادات
            </li>

             <!-- Settings -->
             <li>
                <a href="{{ route('admin.settings.index') }}" 
                   class="flex items-center px-6 py-3 hover:bg-gray-800 hover:text-white transition-colors {{ request()->routeIs('admin.settings.*') ? 'bg-gray-800 text-white border-r-4 border-green-500' : '' }}">
                    <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span>الإعدادات</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>