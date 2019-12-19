<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $name;

    public $email;

    public $message;

    public $attachment;

    /**
     * Create a new message instance.
     *
     * @param $name
     * @param $email
     * @param $message
     * @param $attachment
     *
     * @return void
     */
    public function __construct($name, $email, $message, $attachment)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
        $this->attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->attachment) {
            $this->attach($this->attachment);
        }

        return $this->from($this->email, $this->name)
                    ->to(config('mail.contact.address'), config('mail.contact.name'))
                    ->subject('Contact')
                    ->view('mail.contact', [
                        'content' => $this->message
                    ]);
    }
}
