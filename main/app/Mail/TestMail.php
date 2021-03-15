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

    // ORDER DATA
    public function __construct($order)
    {   
        $this -> order = $order;
    }

    //  E-MAIL
    public function build()
    {
        return $this->
        from('fooduro@fooduro.com') ->
        subject('Conferma ordine | FooDuro') ->
        view('mail.mail');
        
    }
}
