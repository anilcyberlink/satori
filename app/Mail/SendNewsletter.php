<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Model\Newsletter;

class SendNewsletter extends Mailable
{
    use Queueable, SerializesModels;
    public $newsletter;
    /**
     * Create a new message instance.
     */
    public function __construct(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }
    /**
     * Build the message.
     */
    public function build()
    {
        return $this
            ->view('emails.Test_mail')
            ->with([
                'title' => $this->newsletter->title,
                'content' => $this->newsletter->content,
            ])
            ->subject($this->newsletter->title);
    }
}
