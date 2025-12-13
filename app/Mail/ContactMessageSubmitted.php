<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public ContactMessage $messageModel;

    public function __construct(ContactMessage $messageModel)
    {
        $this->messageModel = $messageModel;
    }

    public function build()
    {
        return $this->subject('رسالة تواصل جديدة')
            ->view('emails.contact_message_submitted');
    }
}

