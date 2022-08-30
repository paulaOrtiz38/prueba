import { ClienteModel } from "./cliente.model";

export class CotizacionModel {
    id:string;
    datos_modelo:string;
    cliente:ClienteModel;
    fecha_cotizacion:string
}
