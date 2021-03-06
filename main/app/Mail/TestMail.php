<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    // DATI DELL'ORDINE
    public function __construct($order)
    {   
        $this -> order = $order;
    }

    //  EMAIL CHE INVIAMO
    public function build()
    {
        return $this->
        from('fooduro@fooduro.com') ->
        view('mail.mail');
        
    }
}
