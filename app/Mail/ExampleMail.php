<?php

// app/Mail/ExampleMail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExampleMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->from('info@orbytez.com')
                    ->subject($this->data['subject'])
                    ->view('emails.example')
                    ->with('data', $this->data);
    }
}
