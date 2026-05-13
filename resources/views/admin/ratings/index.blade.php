@extends('layouts.admin')

@section('content')

<div class="mb-8 flex flex-wrap justify-between items-center gap-4">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">إدارة التقييمات</h1>
        <p class="text-gray-500 text-sm mt-1">مراجعة وإدارة تقييمات العملاء</p>
    </div>
    @if($pendingCount > 0)
    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-amber-100 text-amber-700 text-sm font-semibold">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
        </svg>
        {{ $pendingCount }} تقييم بانتظار الموافقة
    </span>
    @endif
</div>

{{-- Stats Row --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
    <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
        <p class="text-xs text-gray-500 font-medium uppercase tracking-wide mb-1">إجمالي التقييمات</p>
        <p class="text-3xl font-bold text-gray-800">{{ $ratings->total() }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
        <p class="text-xs text-gray-500 font-medium uppercase tracking-wide mb-1">منشورة</p>
        <p class="text-3xl font-bold text-green-600">{{ $ratings->where('is_approved', true)->count() }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
        <p class="text-xs text-gray-500 font-medium uppercase tracking-wide mb-1">معلقة</p>
        <p class="text-3xl font-bold text-amber-500">{{ $pendingCount }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
        <p class="text-xs text-gray-500 font-medium uppercase tracking-wide mb-1">متوسط التقييم</p>
        <p class="text-3xl font-bold text-primary">{{ number_format($stats['average'], 2) }}</p>
    </div>
</div>

{{-- Ratings Table --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="text-right px-5 py-4 font-semibold text-gray-600">#</th>
                    <th class="text-right px-5 py-4 font-semibold text-gray-600">المُقيِّم</th>
                    <th class="text-right px-5 py-4 font-semibold text-gray-600">التقييم العام</th>
                    <th class="text-right px-5 py-4 font-semibold text-gray-600 hidden md:table-cell">التفاصيل</th>
                    <th class="text-right px-5 py-4 font-semibold text-gray-600 hidden lg:table-cell">التعليق</th>
                    <th class="text-right px-5 py-4 font-semibold text-gray-600">الحالة</th>
                    <th class="text-right px-5 py-4 font-semibold text-gray-600">التاريخ</th>
                    <th class="text-right px-5 py-4 font-semibold text-gray-600">إجراءات</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($ratings as $rating)
                <tr class="hover:bg-gray-50 transition-colors duration-150" id="row-{{ $rating->id }}">
                    <td class="px-5 py-4 text-gray-400">{{ $rating->id }}</td>

                    <td class="px-5 py-4">
                        <span class="font-medium text-gray-800">
                            {{ $rating->reviewer_name ?: 'مجهول' }}
                        </span>
                    </td>

                    <td class="px-5 py-4">
                        <div class="flex items-center gap-2">
                            <div class="flex gap-0.5">
                                @for ($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= $rating->overall ? 'text-amber-400' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                @endfor
                            </div>
                            <span class="font-bold text-gray-700">{{ $rating->overall }}/5</span>
                        </div>
                    </td>

                    <td class="px-5 py-4 hidden md:table-cell">
                        <div class="space-y-1 text-xs text-gray-500">
                            @if($rating->price)    <div>الأسعار: <span class="font-medium text-gray-700">{{ $rating->price }}/5</span></div> @endif
                            @if($rating->service)  <div>الخدمة: <span class="font-medium text-gray-700">{{ $rating->service }}/5</span></div> @endif
                            @if($rating->staff)    <div>الكوادر: <span class="font-medium text-gray-700">{{ $rating->staff }}/5</span></div> @endif
                            @if($rating->quality)  <div>الجودة: <span class="font-medium text-gray-700">{{ $rating->quality }}/5</span></div> @endif
                        </div>
                    </td>

                    <td class="px-5 py-4 hidden lg:table-cell max-w-xs">
                        @if($rating->comment)
                        <p class="text-gray-600 text-xs leading-relaxed line-clamp-2">{{ $rating->comment }}</p>
                        @else
                        <span class="text-gray-300 text-xs italic">لا يوجد تعليق</span>
                        @endif
                    </td>

                    <td class="px-5 py-4">
                        @if($rating->is_approved)
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                منشور
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-semibold">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
                                معلق
                            </span>
                        @endif
                    </td>

                    <td class="px-5 py-4 text-gray-400 text-xs whitespace-nowrap">
                        {{ $rating->created_at->format('Y/m/d') }}
                    </td>

                    <td class="px-5 py-4">
                        <div class="flex items-center gap-2">
                            @if(!$rating->is_approved)
                            <button onclick="approveRating({{ $rating->id }})"
                                    class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-green-100 hover:bg-green-200 text-green-700 text-xs font-semibold transition-colors duration-150">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                نشر
                            </button>
                            @endif

                            <button onclick="deleteRating({{ $rating->id }})"
                                    class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-red-100 hover:bg-red-200 text-red-600 text-xs font-semibold transition-colors duration-150">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                حذف
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-5 py-16 text-center">
                        <div class="flex flex-col items-center gap-3 text-gray-400">
                            <svg class="w-12 h-12 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                            </svg>
                            <p class="font-medium">لا توجد تقييمات بعد</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($ratings->hasPages())
    <div class="px-5 py-4 border-t border-gray-100">
        {{ $ratings->links() }}
    </div>
    @endif
</div>

<script>
const csrfToken = '{{ csrf_token() }}';

async function approveRating(id) {
    const res = await fetch(`/admin/ratings/${id}/approve`, {
        method: 'PATCH',
        headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
    });
    if (res.ok) {
        const row = document.getElementById(`row-${id}`);
        // Swap the "معلق" badge to "منشور" and remove the approve button
        row.querySelector('[onclick^="approveRating"]')?.remove();
        const badge = row.querySelector('.bg-amber-100');
        if (badge) {
            badge.className = 'inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold';
            badge.innerHTML = `<svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg> منشور`;
        }
    }
}

async function deleteRating(id) {
    if (!confirm('هل أنت متأكد من حذف هذا التقييم؟')) return;
    const res = await fetch(`/admin/ratings/${id}`, {
        method: 'DELETE',
        headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
    });
    if (res.ok) {
        document.getElementById(`row-${id}`)?.remove();
    }
}
</script>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

@endsection
