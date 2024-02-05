<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->from($this->data['email'])
        ->subject('Prijava - ' . $this->data['subject'])
        ->markdown('emails.job', ['data' => $this->data]);

        foreach ($this->data['file-input'] as $attachement) {
            $email->attach($attachement->getRealPath(),
            [
                'as' => $attachement->getClientOriginalName(),
                'mime'=> $attachement->getClientMimeType(),
            ]);
        }

        return $email;
    }
}
