<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cliente extends JsonResource
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
            'nombre_completo' => $this->nombre_completo,
            'email' => $this->email,
            'celular' => $this->celular,
            'acepta_terminos' => $this->acepta_terminos,
            'estado' => $this->estado,
            'fecha_registro' => $this->fecha_registro,
            'ciudad' => $this->ciudad,
            'cotizacion'=> $this->cotizaciones,
        ];
    }
}
