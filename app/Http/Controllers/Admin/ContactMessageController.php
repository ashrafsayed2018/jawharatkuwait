<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(30);
        return view('admin.messages.index', compact('messages'));
    }

    public function show(ContactMessage $message)
    {
        return view('admin.messages.show', compact('message'));
    }

    public function update(Request $request, ContactMessage $message)
    {
        $message->update(['is_read' => (bool) $request->get('is_read')]);
        return redirect()->route('admin.messages.index');
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index');
    }

    public function toggleRead(ContactMessage $message)
    {
        $message->update(['is_read' => ! $message->is_read]);
        return redirect()->route('admin.messages.index');
    }

    public function export(): StreamedResponse
    {
        $headers = ['Content-Type' => 'text/csv', 'Content-Disposition' => 'attachment; filename="messages.csv"'];
        $callback = function () {
            $out = fopen('php://output', 'w');
            fputcsv($out, ['id', 'name', 'phone', 'email', 'service_type', 'message', 'is_read', 'created_at']);
            ContactMessage::orderBy('id')->chunk(200, function ($chunk) use ($out) {
                foreach ($chunk as $m) {
                    fputcsv($out, [$m->id, $m->name, $m->phone, $m->email, $m->service_type, $m->message, $m->is_read ? 1 : 0, $m->created_at]);
                }
            });
            fclose($out);
        };
        return response()->stream($callback, 200, $headers);
    }
}

