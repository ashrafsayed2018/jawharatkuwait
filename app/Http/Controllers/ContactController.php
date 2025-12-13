<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'service_type' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);
        $number = '96550850173';
        $text = "خدمة: {$data['service_type']}\nرسالة:\n{$data['message']}";
        $url = 'https://wa.me/'.$number.'?text='.urlencode($text);
        return redirect()->away($url);
    }
}
