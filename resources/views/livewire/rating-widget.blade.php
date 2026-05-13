@php
    $catFields = [
        ['key' => 'price',   'label' => 'أسعار مناسبة'],
        ['key' => 'service', 'label' => 'خدمة رائعة'],
        ['key' => 'staff',   'label' => 'عمال مدربين'],
        ['key' => 'quality', 'label' => 'خدمة ممتازة'],
    ];
    $avg = $stats['average'];
    $cnt = $stats['count'];
@endphp

<section class="relative py-20 overflow-hidden bg-[#052c22]" id="ratings-section">

    {{-- Decorative background shapes --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-20 -right-20 w-96 h-96 rounded-full bg-primary/10 blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 w-80 h-80 rounded-full bg-[#d4af37]/10 blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] rounded-full border border-white/5"></div>
    </div>

    <div class="relative container mx-auto px-4">

        {{-- Section header --}}
        <div class="text-center mb-14">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#d4af37]/15 border border-[#d4af37]/30 text-[#d4af37] text-sm font-medium mb-5">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                آراء عملائنا
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-3">التقييم</h2>
            <p class="text-gray-400 max-w-lg mx-auto text-sm">رأيك يهمنا — شاركنا تجربتك مع خدماتنا</p>
        </div>

        <div class="grid lg:grid-cols-5 gap-8 items-start">

            {{-- ── Left panel: live stats ─────────────────────────────────────── --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Overall score card --}}
                <div class="relative rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm p-6 text-center overflow-hidden">
                    <div class="absolute inset-0 bg-linear-to-br from-primary/10 to-transparent pointer-events-none"></div>
                    <div class="relative">

                        <div class="text-6xl font-bold text-white mb-1">
                            {{ $cnt > 0 ? number_format($avg, 2) : '—' }}
                        </div>

                        <div class="flex justify-center gap-1 mb-3">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg class="w-7 h-7 transition-all duration-300 {{ $i <= round($avg) ? 'text-[#d4af37]' : 'text-[#d4af37]/25' }}"
                                     fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                        </div>

                        @if($cnt > 0)
                            <div class="inline-block px-4 py-1.5 rounded-full text-sm font-bold bg-primary text-white mb-2">
                                {{ \App\Models\Rating::labelFor((int) round($avg)) }}
                            </div>
                        @else
                            <div class="inline-block px-4 py-1.5 rounded-full text-sm font-bold bg-white/10 text-gray-400 mb-2">—</div>
                        @endif

                        <p class="text-gray-400 text-sm">
                            @if($cnt > 0)
                                تقييم المستخدمين: {{ $avg }} ({{ $cnt }} تقييمات)
                            @else
                                لا توجد تقييمات بعد
                            @endif
                        </p>
                    </div>
                </div>

                {{-- Sub-category rows --}}
                <div class="rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm overflow-hidden divide-y divide-white/5">
                    @foreach ($catFields as $cat)
                        @php
                            $vals   = $reviews->pluck($cat['key'])->filter()->values();
                            $catAvg = $vals->count() ? round($vals->avg(), 1) : 0;
                        @endphp
                        <div class="flex items-center justify-between px-5 py-4 hover:bg-white/5 transition-colors duration-200">
                            <span class="text-gray-300 text-sm font-medium">{{ $cat['label'] }}</span>
                            <div class="flex items-center gap-2">
                                <div class="flex gap-0.5">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg class="w-4 h-4 {{ $i <= round($catAvg) ? 'text-[#d4af37]' : 'text-[#d4af37]/25' }}"
                                             fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @endfor
                                </div>
                                <span class="text-[#d4af37] text-xs font-bold w-6 text-center">
                                    {{ $catAvg > 0 ? $catAvg : '—' }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>

      
            </div>

            {{-- ── Right panel: Livewire form ─────────────────────────────────── --}}
            <div class="lg:col-span-3">
                <div class="rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm p-8">

                    @if($submitted)
                        <div class="flex flex-col items-center justify-center py-12 text-center gap-4">
                            <div class="w-16 h-16 rounded-full bg-primary/20 border border-primary/30 flex items-center justify-center">
                                <svg class="w-8 h-8 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <h3 class="text-white text-xl font-bold">شكراً لتقييمك!</h3>
                            <p class="text-gray-400 text-sm">تم نشر تقييمك بنجاح وهو يظهر الآن للجميع.</p>
                        </div>

                    @else
                        <h3 class="text-white font-bold text-xl mb-6 flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#d4af37]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                            </svg>
                            أضف تقييمك
                        </h3>

                        <form wire:submit.prevent="submit" class="space-y-6">

                            {{-- Overall score --}}
                            <div>
                                <label class="block text-gray-300 text-sm font-semibold mb-3">
                                    التقييم العام <span class="text-red-400">*</span>
                                </label>
                                <div class="flex items-center gap-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <button type="button"
                                                wire:click="setScore('overall', {{ $i }})"
                                                class="w-12 h-12 rounded-xl border transition-all duration-200 flex items-center justify-center {{ ($overall ?? 0) >= $i ? 'bg-[#d4af37]/20 border-[#d4af37]/60' : 'bg-white/5 border-white/10 hover:bg-[#d4af37]/10 hover:border-[#d4af37]/30' }}">
                                            <svg class="w-6 h-6 {{ ($overall ?? 0) >= $i ? 'text-[#d4af37]' : 'text-gray-500' }}"
                                                 fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        </button>
                                    @endfor
                                    @if(($overall ?? 0) > 0)
                                        <span class="text-[#d4af37] font-bold text-sm mr-2">
                                            {{ \App\Models\Rating::labelFor($overall) }}
                                        </span>
                                    @endif
                                </div>
                                @error('overall')
                                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Sub-category pickers --}}
                            <div class="grid sm:grid-cols-2 gap-4">
                                @foreach ($catFields as $cat)
                                @php $fieldVal = match($cat['key']) {
                                    'price'   => $price,
                                    'service' => $service,
                                    'staff'   => $staff,
                                    'quality' => $quality,
                                    default   => 0,
                                }; @endphp
                                <div class="rounded-xl bg-white/5 border border-white/10 p-4">
                                    <label class="block text-gray-400 text-xs font-semibold mb-2 uppercase tracking-wide">
                                        {{ $cat['label'] }}
                                    </label>
                                    <div class="flex gap-1">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <button type="button"
                                                    wire:click="setScore('{{ $cat['key'] }}', {{ $i }})"
                                                    class="w-7 h-7 rounded-lg border transition-all duration-150 flex items-center justify-center {{ ($fieldVal ?? 0) >= $i ? 'bg-[#d4af37]/20 border-[#d4af37]/60' : 'bg-white/5 border-white/10 hover:bg-[#d4af37]/10 hover:border-[#d4af37]/30' }}">
                                                <svg class="w-4 h-4 {{ ($fieldVal ?? 0) >= $i ? 'text-[#d4af37]' : 'text-gray-600' }}"
                                                     fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            </button>
                                        @endfor
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            {{-- Comment --}}
                            <div>
                                <label class="block text-gray-300 text-sm font-semibold mb-2">تعليقك (اختياري)</label>
                                <textarea wire:model="comment"
                                          rows="3"
                                          maxlength="1000"
                                          placeholder="شاركنا رأيك وتجربتك مع خدماتنا…"
                                          class="w-full rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 px-4 py-3 text-sm focus:outline-none focus:border-primary/60 focus:ring-1 focus:ring-primary/30 transition-all duration-200 resize-none"></textarea>
                                @error('comment')
                                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <button type="submit"
                                    wire:loading.attr="disabled"
                                    class="w-full relative inline-flex items-center justify-center gap-3 px-6 py-4 rounded-xl font-bold text-white overflow-hidden transition-all duration-300 hover:scale-[1.02] hover:shadow-lg hover:shadow-primary/30 disabled:opacity-60 disabled:cursor-not-allowed disabled:hover:scale-100">
                                <span class="absolute inset-0 bg-linear-to-r from-primary to-green-600"></span>
                                <span wire:loading.remove wire:target="submit" class="relative z-10 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    إرسال تقييمي
                                </span>
                                <span wire:loading wire:target="submit" class="relative z-10 flex items-center gap-2">
                                    <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 100 16v-4l-3 3 3 3v-4a8 8 0 01-8-8z"/>
                                    </svg>
                                    جارٍ الإرسال…
                                </span>
                            </button>

                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
