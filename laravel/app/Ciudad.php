<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = "ciudades";
    protected $primaryKey = "id";
    protected $fillable = ['nombre', 'departamento_id','estado'];

    
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id')->select('id','nombre');
    }

}
