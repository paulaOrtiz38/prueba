<?php

namespace App;

use App\Mail\NuevaCotizacion;
use Illuminate\Database\Eloquent\Model;

class ClienteCotizacion extends Model
{
    //
    protected $table = "cliente_cotizaciones";
    protected $primaryKey = "id";
    protected $fillable = ['datos_modelo','fecha_cotizacion','correo_enviado','cliente_id'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }  

    /* protected static function boot(){

        parent::boot();

        static::created(function($cotizacion){

            Mail::to('info@diarioprogramador.com')->send($cotizacion);
            //Mail::to('info@diarioprogramador.com')->send(new NuevaCotizacion($cotizacion));

        });

    } */
}
