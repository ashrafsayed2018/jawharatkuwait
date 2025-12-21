<footer class="bg-[#052c22] text-white mt-12 border-t border-[#1a5f50]">
    <div class="container mx-auto px-4 py-28">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 text-center lg:text-right">
            
            {{-- Column 1: Logo & Description --}}
            <div class="flex flex-col items-center lg:items-start space-y-4">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.png') }}" alt="جوهرة الكويت" class="h-20 w-auto object-contain bg-white rounded p-1">
                </div>
                <h2 class="text-xl font-bold text-[#d4af37]">جوهرة الكويت</h2>
                <p class="text-gray-300 leading-relaxed text-sm lg:text-base max-w-sm">
                    دائماً ما نجعل الحدث فريد واستثنائي ذات بصمة مميزه لن تجدها إلا هنا حيث الأصاله والخبرة والخيال العابر الملئ بأفكار تواكب التطور وتشمل معايير الأبداع
                </p>
            </div>

            {{-- Column 2: Helpful Links --}}
            <div class="flex flex-col items-center lg:items-center space-y-6">
                <h3 class="text-xl font-semibold flex items-center gap-4">
                    <span class="h-[1px] w-8 bg-[#d4af37] block lg:hidden"></span>
                    روابط مساعدة
                    <span class="h-[1px] w-8 bg-[#d4af37] block"></span>
                </h3>
                <ul class="space-y-3 text-gray-300 w-full flex flex-col items-center lg:items-center">
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-[#d4af37] transition flex items-center gap-2 group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-0 group-hover:opacity-100 transition-opacity text-[#d4af37]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                            الرئيسية
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}" class="hover:text-[#d4af37] transition flex items-center gap-2 group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-0 group-hover:opacity-100 transition-opacity text-[#d4af37]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                            الخدمات
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="hover:text-[#d4af37] transition flex items-center gap-2 group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-0 group-hover:opacity-100 transition-opacity text-[#d4af37]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                            من نحن
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blog.index') }}" class="hover:text-[#d4af37] transition flex items-center gap-2 group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-0 group-hover:opacity-100 transition-opacity text-[#d4af37]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                            معرض الصور
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact.index') }}" class="hover:text-[#d4af37] transition flex items-center gap-2 group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-0 group-hover:opacity-100 transition-opacity text-[#d4af37]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                            اتصل بنا
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Column 3: Contact Info --}}
            <div class="flex flex-col items-center lg:items-end space-y-6">
                <div class="flex flex-col gap-4 items-center lg:items-end text-gray-300">
                    <div class="flex items-center gap-3">
                        <span>الكويت - جميع المناطق</span>
                        <div class="w-8 h-8 rounded-full bg-[#1a5f50] flex items-center justify-center text-[#d4af37]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>
                    
                    @if($phone = $siteSettings->phone_number ?? '50850173')
                    <div class="flex items-center gap-3">
                        <a href="tel:{{ $phone }}" dir="ltr" class="hover:text-[#d4af37] transition">{{ $phone }}</a>
                        <div class="w-8 h-8 rounded-full bg-[#1a5f50] flex items-center justify-center text-[#d4af37]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                    </div>
                    @endif
                    
                    @if($whatsapp = $siteSettings->whatsapp_number ?? '50850173')
                    <div class="flex items-center gap-3">
                        <a href="https://wa.me/{{ Str::startsWith($whatsapp, '965') ? $whatsapp : '965'.$whatsapp }}" dir="ltr" class="hover:text-[#d4af37] transition">{{ $whatsapp }}</a>
                        <div class="w-8 h-8 rounded-full bg-[#1a5f50] flex items-center justify-center text-[#d4af37]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.592 2.654-.696c1.001.54 1.973.83 2.806.83 3.181 0 5.767-2.587 5.767-5.766.001-3.182-2.585-5.767-5.767-5.767zm0 10.428c-.83 0-1.745-.306-2.56-.783l-1.913.502.512-1.866c-.538-.853-.825-1.705-.825-2.515 0-2.571 2.091-4.661 4.662-4.661 2.571 0 4.661 2.09 4.661 4.661 0 2.572-2.09 4.662-4.537 4.662z"/>
                            </svg>
                        </div>
                    </div>
                    @endif
                </div>

                {{-- Social Icons --}}
                <div class="flex gap-3 mt-2">
                    @if($instagram = \App\Models\Setting::where('key','instagram_link')->value('value'))
                    <a href="{{ $instagram }}" target="_blank" class="w-10 h-10 rounded bg-[#1a5f50] flex items-center justify-center text-white hover:bg-[#d4af37] transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772 4.902 4.902 0 011.772-1.153c.636-.247 1.363-.416 2.427-.465C9.673 2.013 10.03 2 12.488 2h.172zm-2.55 4.694c-1.637.387-2.923 1.57-3.376 3.195-.145.52-.204 1.14-.204 2.111 0 1.025.06 1.62.22 2.164.382 1.304 1.436 2.308 2.766 2.636.568.14 1.185.196 2.247.196 1.034 0 1.636-.054 2.179-.196 1.346-.353 2.392-1.364 2.756-2.68.14-.509.19-1.1.19-2.122 0-.964-.055-1.59-.197-2.11-.362-1.328-1.424-2.333-2.78-2.673-.538-.135-1.13-.19-2.13-.19-1.03 0-1.65.06-2.17.19zm1.59 2.124c1.396-.105 2.686.87 2.91 2.274.225 1.403-.64 2.787-1.99 3.14-1.35.353-2.78-.387-3.19-1.74-.41-1.352.41-2.793 1.77-3.14.167-.043.334-.065.5-.065zm5.728-2.028c-.524 0-.95.426-.95.95 0 .524.426.95.95.95.524 0 .95-.426.95-.95 0-.524-.426-.95-.95-.95z" clip-rule="evenodd" /></svg>
                    </a>
                    @endif
                    @if($snapchat = \App\Models\Setting::where('key','snapchat_link')->value('value'))
                    <a href="{{ $snapchat }}" target="_blank" class="w-10 h-10 rounded bg-[#1a5f50] flex items-center justify-center text-white hover:bg-[#d4af37] transition">
                         <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2c3.31 0 6 2.69 6 6v.07c0 1.67 1.09 3.12 2.7 3.6.3.09.5.38.43.69a.62.62 0 01-.6.48c-.63.02-1.08.56-1.08 1.18 0 .66.56 1.2 1.22 1.18.29-.01.54.21.59.5.06.36-.23.66-.57.66-1.4 0-2.31.94-3.46 1.53-1.1.56-2.28.86-3.48.93-.1.3-.36.52-.68.52h-2.05c-.32 0-.58-.22-.68-.52-1.2-.07-2.38-.37-3.48-.93-1.15-.59-2.06-1.53-3.46-1.53-.34 0-.63-.3-.57-.66.05-.29.3-.51.59-.5.66.02 1.22-.52 1.22-1.18 0-.62-.45-1.16-1.08-1.18a.62.62 0 01-.6-.48.63.63 0 01.43-.69c1.61-.48 2.7-1.93 2.7-3.6V8c0-3.31 2.69-6 6-6z"/></svg>
                    </a>
                    @endif
                    @if($tiktok = \App\Models\Setting::where('key','tiktok_link')->value('value'))
                    <a href="{{ $tiktok }}" target="_blank" class="w-10 h-10 rounded bg-[#1a5f50] flex items-center justify-center text-white hover:bg-[#d4af37] transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M15.5 3a5.5 5.5 0 004.5 2.4V9a9.02 9.02 0 01-4.5-1.3V14a5 5 0 11-5-5c.35 0 .7.03 1.03.1V12a2.5 2.5 0 102.47 2.5V3h1.5z"/></svg>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="mt-12 pt-6 border-t border-[#1a5f50] text-center text-gray-400 text-sm flex flex-col md:flex-row justify-between items-center gap-4">
            <div>© {{ date('Y') }} جوهرة الكويت للضيافة والمناسبات. جميع الحقوق محفوظة</div>
            <div class="flex items-center gap-4">
                 <a href="#" class="hover:text-white transition">سياسة الخصوصية</a>
                 <a href="#" class="hover:text-white transition">شروط الاستخدام</a>
            </div>
        </div>
    </div>
</footer>