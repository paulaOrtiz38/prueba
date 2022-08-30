<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = "config";
    protected $primaryKey = "id";
    protected $fillable = ['tipo','correos'];
}
