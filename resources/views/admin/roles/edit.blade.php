@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">تعديل الدور</h1>
        </div>
        <a href="{{ route('admin.roles.index') }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors shadow-sm font-medium">
            إلغاء
        </a>
    </div>

    <form method="post" action="{{ route('admin.roles.update', $role) }}">
        @csrf
        @method('PUT')
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden p-6 space-y-6">
            <!-- Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">الاسم البرمجي (Name) <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name', $role->name) }}" class="w-full px-4 py-3 rounded-lg border-gray-300 border focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors shadow-sm @error('name') border-red-500 @enderror" required>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Label -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">الاسم الظاهر (Label)</label>
                <input type="text" name="label" value="{{ old('label', $role->label) }}" class="w-full px-4 py-3 rounded-lg border-gray-300 border focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors shadow-sm @error('label') border-red-500 @enderror">
                @error('label')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4 border-t border-gray-100">
                <button type="submit" class="w-full py-3 px-4 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg shadow-sm transition-colors">
                    حفظ التغييرات
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
