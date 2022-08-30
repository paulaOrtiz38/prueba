<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\ClienteCotizacion;
use App\Http\Resources\ClienteCotizacion as ClienteCotizacionResource;

   
class ClienteCotizacionController extends BaseController
{
    public function index()
    {
         $clienteCotizaciones = ClienteCotizacion::all();
        return $this->sendResponse(ClienteCotizacionResource::collection($clienteCotizaciones), 'Clientes.');
    }
    
    public function show($id)
    {
        $clienteCotizacion = ClienteCotizacion::find($id);
        if (is_null($clienteCotizacion)) {
            return $this->sendError('Cliente no existe.');
        }
        return $this->sendResponse(new ClienteCotizacionResource($clienteCotizacion), 'Cliente buscado');
    }
    
}