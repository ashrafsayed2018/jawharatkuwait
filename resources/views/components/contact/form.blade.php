<div class="max-w-lg mx-auto bg-white rounded-2xl shadow-xl p-8">
    <h2 class="text-2xl font-bold text-center">تواصل معنا</h2>
    <p class="text-gray-500 text-center mt-2">جاهزون لخدمتكم في الضيافة وتنظيم المناسبات.</p>
    <form method="post" action="{{ route('contact.store') }}" class="mt-6 space-y-4">
        @csrf
        <input name="name" value="{{ old('name') }}" class="w-full border p-3 rounded" placeholder="الاسم الكامل">
        <input name="phone" value="{{ old('phone') }}" class="w-full border p-3 rounded" placeholder="رقم الهاتف">
        <input name="service_type" value="{{ old('service_type') }}" class="w-full border p-3 rounded" placeholder="اسم الخدمة" required>
        <textarea name="message" class="w-full border p-3 rounded" rows="5" placeholder="الرسالة" required>{{ old('message') }}</textarea>
        <button class="w-full px-5 py-3 bg-green-600 hover:bg-green-700 text-white rounded">إرسال عبر واتساب</button>
    </form>
    <div class="mt-4 text-center">
        <a href="https://wa.me/{{ $siteSettings->whatsapp_number ?? '96550850173' }}" class="underline" target="_blank">واتساب مباشر</a>
    </div>
</div>
