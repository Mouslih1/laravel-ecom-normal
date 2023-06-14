<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ActiveYourAccount extends Mailable
{
    use Queueable, SerializesModels;

    public $code;
    public $url;

    /**
     * Create a new message instance.
     */
    public function __construct($code)
    {
        $this->code = $code;
        $this->url = route('user.activer', $code);
    }

    /**
     * Build a message
     */
    public function build(){
        
        return $this->from('E_commerceProject@Contact.com')->markdown('emails.active_user_account');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Active Your Account',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
