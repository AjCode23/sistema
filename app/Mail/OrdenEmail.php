<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrdenEmail extends Mailable
{
    use Queueable, SerializesModels;

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
       return $this->view('emails.orden')
        ->from('xcomerce2017@gmail.com','SET Y GAD S.A.S')
        ->subject('Orden de Venta Aprobada por El Cliente Nro.'.$this->orden->id);
    }
}
