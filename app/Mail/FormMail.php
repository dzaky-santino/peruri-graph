<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->from('peruri@gmail.com', 'Peruri')
                    ->subject('Data User')
                    ->view('emails.form_submission'); // Sesuai dengan nama file
    }    
}