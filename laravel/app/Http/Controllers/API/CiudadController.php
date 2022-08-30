<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Ciudad;
use App\Http\Resources\Ciudad as CiudadResource;
   
class CiudadController extends BaseController
{
    public function index()
    {
        $ciudades = Ciudad::with('departamento')->get();
        return $this->sendResponse(CiudadResource::collection($ciudades), 'ciudades.');
    }

    public function show($id)
    {
        $ciudad = Ciudad::find($id);
        if (is_null($ciudad)) {
            return $this->sendError('City does not exist**.');
        }
        return $this->sendResponse(new CiudadResource($ciudad), 'City fetched.');
    }
    
}