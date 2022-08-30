<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    
    protected $table = "clientes";
    protected $primaryKey = "id";
    protected $fillable = ['nombre_completo','email','celular','acepta_terminos','fecha_registro','estado','ciudad_id'];
    
    public function scopeEmailCliente($query, $email)
    {
        return $query->where('email', $email);
    }

    public function cotizaciones()
    {
        return $this->hasMany(ClienteCotizacion::class)->select('id','datos_modelo','fecha_cotizacion','correo_enviado','cliente_id');
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id')->select('id','nombre');
    }
}
