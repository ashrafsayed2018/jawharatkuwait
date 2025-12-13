<div dir="rtl" style="font-family: sans-serif">
    <h2>رسالة جديدة من نموذج التواصل</h2>
    <p>الاسم: {{ $messageModel->name }}</p>
    <p>الهاتف: {{ $messageModel->phone }}</p>
    <p>البريد: {{ $messageModel->email }}</p>
    <p>نوع الخدمة: {{ $messageModel->service_type }}</p>
    <p>الرسالة:</p>
    <pre style="white-space: pre-wrap">{{ $messageModel->message }}</pre>
</div>
