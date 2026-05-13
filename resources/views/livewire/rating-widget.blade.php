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

<section class="py-20 bg-[#052c22]" id="ratings-section"
         x-data="{
             scores: { overall: 0, price: 0, service: 0, staff: 0, quality: 0 },
             comment: '',
             labels: ['', 'ضعيف', 'مقبول', 'جيد', 'جيد جداً', 'ممتاز'],
             setScore(field, val) { this.scores[field] = val; }
         }">
    <div class="container mx-auto px-4">

        {{-- Header --}}
        <div class="text-center mb-14">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#d4af37]/15 border border-[#d4af37]/30 text-[#d4af37] text-sm font-medium mb-5">
                <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                آراء عملائنا
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-3">التقييم</h2>
            <p class="text-gray-400 text-sm">رأيك يهمنا — شاركنا تجربتك مع خدماتنا</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">

            {{-- ── Stats column ──────────────────────────────────────────────── --}}
            <div class="lg:col-span-2 space-y-5">

                <div class="rounded-2xl bg-white/5 border border-white/10 p-6 text-center">
                    <div class="text-6xl font-bold text-white leading-none mb-3">
                        {{ $cnt > 0 ? number_format($avg, 1) : '—' }}
                    </div>
                    <div class="flex justify-center gap-1 mb-4">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg class="w-7 h-7 {{ $i <= round($avg) ? 'text-[#d4af37]' : 'text-white/20' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                    </div>
                    @if($cnt > 0)
                        <span class="inline-block px-4 py-1.5 rounded-full text-sm font-bold bg-primary text-white mb-2">
                            {{ \App\Models\Rating::labelFor((int) round($avg)) }}
                        </span>
                        <p class="text-gray-400 text-sm mt-2">{{ $cnt }} تقييم من عملائنا</p>
                    @else
                        <p class="text-gray-500 text-sm">لا توجد تقييمات بعد</p>
                    @endif
                </div>

                <div class="rounded-2xl bg-white/5 border border-white/10 overflow-hidden">
                    @foreach ($catFields as $index => $cat)
                        @php
                            $vals   = $reviews->pluck($cat['key'])->filter()->values();
                            $catAvg = $vals->count() ? round($vals->avg(), 1) : 0;
                            $pct    = ($catAvg / 5) * 100;
                        @endphp
                        <div class="px-5 py-4 {{ $index < count($catFields) - 1 ? 'border-b border-white/5' : '' }}">
                            <div class="flex items-center justify-between mb-2" dir="rtl">
                                <span class="text-gray-300 text-sm font-medium">{{ $cat['label'] }}</span>
                                <span class="text-[#d4af37] text-sm font-bold">{{ $catAvg > 0 ? $catAvg : '—' }}</span>
                            </div>
                            <div class="w-full bg-white/10 rounded-full h-2">
                                <div class="bg-[#d4af37] h-2 rounded-full" style="width: {{ $pct }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- ── Form column ───────────────────────────────────────────────── --}}
            <div class="lg:col-span-3">
                <div class="rounded-2xl bg-white/5 border border-white/10 p-6 md:p-8">

                    @if($submitted)
                        <div class="flex flex-col items-center justify-center py-16 text-center gap-4">
                            <div class="w-16 h-16 rounded-full bg-primary/20 border border-primary/30 flex items-center justify-center">
                                <svg class="w-8 h-8 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <h3 class="text-white text-xl font-bold">شكراً لتقييمك!</h3>
                            <p class="text-gray-400 text-sm">تم إرسال تقييمك بنجاح.</p>
                        </div>

                    @else
                        <h3 class="text-white font-bold text-xl mb-6 text-right">أضف تقييمك</h3>

                        <form wire:ignore
                              @submit.prevent="
                                  $wire.set('overall', scores.overall);
                                  $wire.set('price',   scores.price);
                                  $wire.set('service', scores.service);
                                  $wire.set('staff',   scores.staff);
                                  $wire.set('quality', scores.quality);
                                  $wire.set('comment', comment);
                                  $nextTick(() => $wire.submit());
                              "
                              class="space-y-6">

                            {{-- Overall stars --}}
                            <div dir="rtl">
                                <label class="block text-gray-300 text-sm font-semibold mb-3">
                                    التقييم العام <span class="text-red-400">*</span>
                                </label>
                                <div class="flex items-center flex-wrap gap-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <button type="button"
                                                @click="setScore('overall', {{ $i }})"
                                                :class="scores.overall >= {{ $i }}
                                                    ? 'bg-[#d4af37]/20 border-[#d4af37]'
                                                    : 'bg-white/5 border-white/10 hover:border-[#d4af37]/50'"
                                                class="w-11 h-11 rounded-xl border-2 transition-colors duration-75 flex items-center justify-center">
                                            <svg :class="scores.overall >= {{ $i }} ? 'text-[#d4af37]' : 'text-gray-500'"
                                                 class="w-5 h-5 pointer-events-none" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        </button>
                                    @endfor
                                    <span x-show="scores.overall > 0"
                                          x-text="labels[scores.overall]"
                                          class="text-[#d4af37] font-bold text-sm px-3 py-1 rounded-lg bg-[#d4af37]/10 border border-[#d4af37]/30"></span>
                                </div>
                                @error('overall')
                                    <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Sub-category grid --}}
                            <div class="grid grid-cols-2 gap-3" dir="rtl">
                                @foreach ($catFields as $cat)
                                    <div class="rounded-xl bg-white/5 border border-white/10 p-3">
                                        <p class="text-gray-400 text-xs font-semibold mb-2">{{ $cat['label'] }}</p>
                                        <div class="flex gap-1 flex-wrap">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <button type="button"
                                                        @click="setScore('{{ $cat['key'] }}', {{ $i }})"
                                                        :class="scores['{{ $cat['key'] }}'] >= {{ $i }}
                                                            ? 'bg-[#d4af37]/20 border-[#d4af37]/70'
                                                            : 'bg-white/5 border-white/10 hover:border-[#d4af37]/40'"
                                                        class="w-7 h-7 rounded-lg border transition-colors duration-75 flex items-center justify-center">
                                                    <svg :class="scores['{{ $cat['key'] }}'] >= {{ $i }} ? 'text-[#d4af37]' : 'text-gray-600'"
                                                         class="w-3.5 h-3.5 pointer-events-none" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                </button>
                                            @endfor
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Comment --}}
                            <div dir="rtl">
                                <label class="block text-gray-300 text-sm font-semibold mb-2">تعليقك (اختياري)</label>
                                <textarea x-model="comment"
                                          rows="3"
                                          maxlength="1000"
                                          placeholder="شاركنا رأيك وتجربتك مع خدماتنا…"
                                          class="w-full rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 px-4 py-3 text-sm focus:outline-none focus:border-primary/60 resize-none"></textarea>
                                @error('comment')
                                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <button type="submit"
                                    class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-4 px-6 rounded-xl transition-all duration-200 hover:shadow-lg flex items-center justify-center gap-2">
                                <svg class="w-5 h-5 pointer-events-none" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                إرسال تقييمي
                            </button>

                        </form>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>
