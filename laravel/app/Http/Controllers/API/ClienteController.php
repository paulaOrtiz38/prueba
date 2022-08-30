<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Cliente;
use App\Http\Resources\Cliente as ClienteResource;
use App\ClienteCotizacion;
use App\Mail\NuevaCotizacion;
use Illuminate\Support\Facades\Mail;
use App\Config;

use Carbon\Carbon;
   
class ClienteController extends BaseController
{
    public function index()
    {
        $clientes = Cliente::with(['ciudad','cotizaciones' => function ( $query ){
            return $query->orderBy('fecha_cotizacion','DESC')->first();
        }])
                    ->get();
        return $this->sendResponse(ClienteResource::collection($clientes), 'Clientes.');
    }
    
    public function show($id)
    {
        $cliente = Cliente::find($id);
        if (is_null($cliente)) {
            return $this->sendError('Cliente no existe.');
        }
        return $this->sendResponse(new ClienteResource($cliente), 'Cliente buscado');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['fecha_registro'] = date('Y-m-d');
        
        $validator = Validator::make($input, [
            'nombre_completo' => 'required',
            'email' => 'required|email',
            'celular' => 'min:10|required',
            'datos_modelo' => 'required',
            'ciudad_id' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

         $ultima_cotizacion = $this::fecha_ultima_cotizacion($input['email']);

        if($ultima_cotizacion){
            $cliente = Cliente::findOrFail($ultima_cotizacion->cliente_id);
            $fecha_actual= Carbon::parse(date('Y-m-d'));
            $fecha_cot = Carbon::parse($ultima_cotizacion->fecha_cotizacion);
             
            if($fecha_actual->diffInDays($fecha_cot) == 0){
                return $this->sendError('Ya se ha enviado una cotizacion el día de hoy.');
            }
                        
        }else{

            $cliente = Cliente::create($input);
   
        }

        //crear cotizacion
        $cotizacion = ClienteCotizacion::create([
            'datos_modelo' => $input['datos_modelo'],
            'fecha_cotizacion' => date('Y-m-d'),
            'cliente_id' => $cliente->id,
            'correo_enviado' => '1'
        ]);
   
        $this->enviarCorreoFalta($cliente->id);
        return $this->sendResponse(new ClienteResource($cliente), 'Cotización enviada correctamente');
        
    } 

    static function fecha_ultima_cotizacion($email){

        $cotizacion = Cliente::with(['cotizaciones' => function ( $query ){
            return $query->orderBy('fecha_cotizacion','DESC')->first();
        }])
        ->emailCliente($email)->first();

        return ($cotizacion->cotizaciones[0])?? false;
    }

    /**
     * enviar correo
     */
    public function enviarCorreoFalta($clienteId)
    {
        $correos = Config::all()->toArray();
        $correosArray = array_column($correos,'correos');

        if(empty($correosArray)){
            return;
        }

        $cliente = Cliente::find($clienteId);
        $mailable = new NuevaCotizacion($cliente);
        Mail::to($correosArray)->send($mailable);
    
    }

    
}