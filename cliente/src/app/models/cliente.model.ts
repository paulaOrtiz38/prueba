import { CiudadModel } from "./ciudad.model";

export class ClienteModel {
    id:string;
    nombre_completo:string;
    email:string;
    celular:string;
    acepta_terminos:string;
    estado:string;
    ciudad:CiudadModel;
    ciudad_id:number;
}
