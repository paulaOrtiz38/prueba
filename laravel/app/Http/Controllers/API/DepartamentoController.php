<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Departamento;
use App\Http\Resources\Departamento as DepartamentoResource;
   
class DepartamentoController extends BaseController
{
    public function index()
    {
         $departamento = Departamento::all();
        return $this->sendResponse(DepartamentoResource::collection($departamento), 'departamentos.');
    }
    
 
   
    public function show($id)
    {
        $departamento = Departamento::find($id);
        if (is_null($departamento)) {
            return $this->sendError('Departamento no exista.');
        }
        return $this->sendResponse(new DepartamentoResource($departamento), 'ciudad buscada');
    }
    
}