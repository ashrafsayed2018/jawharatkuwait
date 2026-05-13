<section class="py-20 bg-[#041f18]" id="comments-section">
    <div class="container mx-auto px-4">

        {{-- Header --}}
        <div class="text-center mb-14">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#d4af37]/15 border border-[#d4af37]/30 text-[#d4af37] text-sm font-medium mb-5">
                <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/>
                </svg>
                تعليقات العملاء
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-3">ماذا يقول عملاؤنا</h2>
            <p class="text-gray-400 text-sm">شاركنا رأيك وتجربتك معنا</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">

            {{-- ── Form column ──────────────────────────────────────────────── --}}
            <div class="lg:col-span-2">
                <div class="rounded-2xl bg-white/5 border border-white/10 p-6 md:p-8">

                    @if($submitted)
                        <div class="flex flex-col items-center justify-center py-12 text-center gap-4">
                            <div class="w-16 h-16 rounded-full bg-primary/20 border border-primary/30 flex items-center justify-center">
                                <svg class="w-8 h-8 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <h3 class="text-white text-xl font-bold">شكراً على تعليقك!</h3>
                            <p class="text-gray-400 text-sm">تم نشر تعليقك بنجاح.</p>
                        </div>
                    @else
                        <h3 class="text-white font-bold text-xl mb-6 text-right">أضف تعليقك</h3>

                        <form wire:submit.prevent="submit" class="space-y-5" dir="rtl">

                            <div>
                                <label class="block text-gray-300 text-sm font-semibold mb-2">
                                    الاسم <span class="text-red-400">*</span>
                                </label>
                                <input wire:model="name"
                                       type="text"
                                       maxlength="100"
                                       placeholder="اكتب اسمك هنا…"
                                       class="w-full rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 px-4 py-3 text-sm focus:outline-none focus:border-primary/60 focus:ring-1 focus:ring-primary/30 transition-all duration-200" />
                                @error('name')
                                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-gray-300 text-sm font-semibold mb-2">
                                    التعليق <span class="text-red-400">*</span>
                                </label>
                                <textarea wire:model="body"
                                          rows="4"
                                          maxlength="2000"
                                          placeholder="اكتب تعليقك هنا…"
                                          class="w-full rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 px-4 py-3 text-sm focus:outline-none focus:border-primary/60 focus:ring-1 focus:ring-primary/30 transition-all duration-200 resize-none"></textarea>
                                @error('body')
                                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit"
                                    wire:loading.attr="disabled"
                                    class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-4 px-6 rounded-xl transition-all duration-200 hover:shadow-lg disabled:opacity-60 disabled:cursor-not-allowed flex items-center justify-center gap-2">
                                <span wire:loading.remove wire:target="submit" class="flex items-center gap-2">
                                    <svg class="w-5 h-5 pointer-events-none" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                                    </svg>
                                    إرسال التعليق
                                </span>
                                <span wire:loading wire:target="submit" class="flex items-center gap-2">
                                    <svg class="w-4 h-4 animate-spin pointer-events-none" fill="none" viewBox="0 0 24 24">
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

            {{-- ── Comments list ────────────────────────────────────────────── --}}
            <div class="lg:col-span-3">
                @if($comments->isEmpty())
                    <div class="rounded-2xl bg-white/5 border border-white/10 p-12 text-center">
                        <svg class="w-12 h-12 text-gray-600 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/>
                        </svg>
                        <p class="text-gray-500 text-sm">لا توجد تعليقات بعد — كن أول من يعلّق!</p>
                    </div>
                @else
                    <div class="space-y-4">
                        @foreach($comments as $comment)
                            <div class="rounded-2xl bg-white/5 border border-white/10 p-5" dir="rtl">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-10 h-10 rounded-full bg-primary/20 border border-primary/30 flex items-center justify-center shrink-0">
                                        <span class="text-primary font-bold text-sm">
                                            {{ mb_substr($comment->name, 0, 1) }}
                                        </span>
                                    </div>
                                    <div>
                                        <p class="text-white font-semibold text-sm">{{ $comment->name }}</p>
                                        <p class="text-gray-500 text-xs">{{ $comment->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <p class="text-gray-300 text-sm leading-relaxed">{{ $comment->body }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>
</section>
