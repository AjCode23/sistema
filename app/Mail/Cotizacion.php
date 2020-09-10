<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Cotizacion extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $orden;

    public function __construct($orden)
    {
        $this->orden=$orden;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.cotizacion')
        ->from('xcomerce2017@gmail.com','SET Y GAD S.A.S')
        ->subject('Cotizacion Pendiente Nro.'.$this->orden->id);
    }
}
