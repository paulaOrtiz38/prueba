<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;

class ciudadController extends Controller
{
    
    public function buscarCiudadesDep($dep_id)
    {
         $ciudades = Ciudad::where('departamento_id',$dep_id)->get();
       
        return json_decode(json_encode(['data'=>$ciudades,'message'=>'ciudades']),true);
    }
}