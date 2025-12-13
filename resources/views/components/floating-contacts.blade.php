@php($whatsapp = $siteSettings->whatsapp_number ?? '96550850173')
@php($phone = $siteSettings->phone_number ?? '96550850173')
@php($snapchat = $siteSettings->snapchat_url ?? null)
@php($instagram = $siteSettings->instagram_url ?? null)
@php($tiktok = $siteSettings->tiktok_url ?? null)
<div class="fixed bottom-4 right-4 z-50 flex flex-col gap-3">
    <a href="https://wa.me/{{ $whatsapp }}" target="_blank" rel="noopener" class="w-12 h-12 rounded-full bg-green-500 shadow-lg grid place-items-center text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2C6.58 2 2.26 6.32 2.26 11.78c0 2.08.64 4.03 1.75 5.64L2 22l4.74-1.96c1.57.86 3.35 1.33 5.26 1.33 5.46 0 9.78-4.32 9.78-9.78C21.78 6.32 17.5 2 12.04 2zm5.71 13.99c-.24.68-1.41 1.3-1.94 1.34-.5.04-1.14.07-3.95-1.78-3.31-2.02-5.42-5.46-5.59-5.71-.16-.24-1.33-1.78-1.27-3.41.06-1.63.93-2.43 1.25-2.77.32-.34.69-.43.91-.43.22 0 .46 0 .66.01.21.01.5-.08.78.6.29.68.98 2.35 1.07 2.52.09.17.14.37.02.6-.12.24-.18.39-.36.6-.18.21-.38.47-.54.63-.18.18-.37.37-.16.72.2.35.92 1.52 1.98 2.46 1.36 1.17 2.5 1.53 2.86 1.69.36.16.57.14.78-.08.21-.22.9-1.05 1.14-1.41.24-.36.49-.3.82-.18.34.12 2.18 1.03 2.55 1.21.36.18.6.27.69.42.09.15.09.85-.15 1.53z"/></svg>
    </a>
    <a href="tel:{{ $phone }}" class="w-12 h-12 rounded-full bg-blue-500 shadow-lg grid place-items-center text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.02-.24c1.12.37 2.33.57 3.57.57a1 1 0 011 1V21a1 1 0 01-1 1C11.06 22 2 12.94 2 2a1 1 0 011-1h3.49a1 1 0 011 1c0 1.24.2 2.45.57 3.57a1 1 0 01-.24 1.02l-2.2 2.2z"/></svg>
    </a>
    @if($tiktok)
    <a href="{{ $tiktok }}" target="_blank" rel="noopener" class="w-12 h-12 rounded-full bg-black shadow-lg grid place-items-center text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor"><path d="M15.5 3a5.5 5.5 0 004.5 2.4V9a9.02 9.02 0 01-4.5-1.3V14a5 5 0 11-5-5c.35 0 .7.03 1.03.1V12a2.5 2.5 0 102.47 2.5V3h1.5z"/></svg>
    </a>
    @endif
    @if($snapchat)
    <a href="{{ $snapchat }}" target="_blank" rel="noopener" class="w-12 h-12 rounded-full bg-yellow-400 shadow-lg grid place-items-center text-black">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2c3.31 0 6 2.69 6 6v.07c0 1.67 1.09 3.12 2.7 3.6.3.09.5.38.43.69a.62.62 0 01-.6.48c-.63.02-1.08.56-1.08 1.18 0 .66.56 1.2 1.22 1.18.29-.01.54.21.59.5.06.36-.23.66-.57.66-1.4 0-2.31.94-3.46 1.53-1.1.56-2.28.86-3.48.93-.1.3-.36.52-.68.52h-2.05c-.32 0-.58-.22-.68-.52-1.2-.07-2.38-.37-3.48-.93-1.15-.59-2.06-1.53-3.46-1.53-.34 0-.63-.3-.57-.66.05-.29.3-.51.59-.5.66.02 1.22-.52 1.22-1.18 0-.62-.45-1.16-1.08-1.18a.62.62 0 01-.6-.48.63.63 0 01.43-.69c1.61-.48 2.7-1.93 2.7-3.6V8c0-3.31 2.69-6 6-6z"/></svg>
    </a>
    @endif
    @if($instagram)
    <a href="{{ $instagram }}" target="_blank" rel="noopener" class="w-12 h-12 rounded-full bg-purple-600 shadow-lg grid place-items-center text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor"><path d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm0 2h10c1.66 0 3 1.34 3 3v10c0 1.66-1.34 3-3 3H7c-1.66 0-3-1.34-3-3V7c0-1.66 1.34-3 3-3zm11 2a1 1 0 100 2 1 1 0 000-2zM12 7a5 5 0 100 10 5 5 0 000-10z"/></svg>
    </a>
    @endif
</div>
