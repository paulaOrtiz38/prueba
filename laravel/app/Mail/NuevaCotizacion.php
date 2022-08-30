<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NuevaCotizacion extends Mailable
{
    use Queueable, SerializesModels;
    //protected $cotizacion;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cotizacion)
    {
        //
        $this->cotizacion = $cotizacion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@pruebatecnica.com', 'Sistema de Notificaciones')
        ->subject('Registro de una nueva cotizacion')
        ->view('email.correo', ['cotizacion' => $this->cotizacion]);
    }
}
