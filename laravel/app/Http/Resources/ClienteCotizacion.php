<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClienteCotizacion extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'datos_modelo' => $this->nombre_completo,
            'fecha_cotizacion' => $this->fecha_cotizacion,
            'correo_enviado' => $this->correo_enviado,
            'cliente'=> $this->cliente,
        ];
    }
}
