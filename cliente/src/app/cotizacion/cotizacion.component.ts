import { Component, OnInit } from '@angular/core';
import { UntypedFormGroup, UntypedFormControl, Validators } from '@angular/forms';
import { CotizacionService } from '../services/cotizacion.service';
import { Observable } from 'rxjs';
import { CiudadModel } from '../models/ciudad.model';
import { DepartamentoModel } from '../models/departamento.model';
import { ClienteModel } from '../models/cliente.model';
import { environment } from 'src/environments/environment';

interface modelos{
  subtitle:string,
}

@Component({
  selector: 'app-cotizacion',
  templateUrl: './cotizacion.component.html',
  styleUrls: ['./cotizacion.component.css']
})
export class CotizacionComponent implements OnInit {

  exform: UntypedFormGroup;
  ciudades : CiudadModel[]=[];
  departamentos : DepartamentoModel[] = [];
  cliente = new ClienteModel();
  modelos:modelos[];
  acepta:boolean;
  url = environment.urlDoc+'/terminos/TERMINOS_CONDICIONES.pdf';
  
  constructor(private _cotizacionService:CotizacionService,) { }

  ngOnInit():void{

      this.exform = new UntypedFormGroup({
        'nombre_completo' : new UntypedFormControl(null, Validators.required),
        'email' : new UntypedFormControl(null, [Validators.required, Validators.email]),
        'celular' : new UntypedFormControl(
          null,
          [
            Validators.required,
            Validators.pattern('^\\s*(?:\\+?(\\d{1,3}))?[-. (]*(\\d{3})[-. )]*(\\d{3})[-. ]*(\\d{4})(?: *x(\\d+))?\\s*$')
          ]),
          'datos_modelo' : new UntypedFormControl(null, [Validators.required]),   
          'departamento' : new UntypedFormControl(null, []),       
          'ciudad_id' : new UntypedFormControl(null, [Validators.required]),
          'acepta_terminos' : new UntypedFormControl(null, []),
      });

      this.getDepartamentos();
      this.getModelos();
  }

  clicksub() {
    console.log(this.exform.value);
    this.cliente = this.exform.value;
    let res = this.enviarCotizacion();
  }

  get nombre_completo() {
    return this.exform.get('nombre_completo');
  }

  get email() {
    return this.exform.get('email');
  }

  get celular() {
    return this.exform.get('celular');
  }

  get datos_modelo() {
    return this.exform.get('datos_modelo');
  }

  get departamento() {
    return this.exform.get('departamento');
  }
  get ciudad_id() {
    return this.exform.get('ciudad_id');
  }

  getModelos(){
    this._cotizacionService.getModelos().subscribe((modelos:modelos[])=>{
      this.modelos = modelos;    
    },(error)=>{
      this.modelos = [{subtitle:"Ssang Young Tivoli"},{subtitle:"Ssang Young Korando"},{subtitle:"Ssang Young aption"}];
      console.log(this.modelos);
    });
  }

  public getDepartamentos():void{
    this._cotizacionService.getDepartamentos().subscribe((departamentos:DepartamentoModel[])=>{
      this.departamentos = departamentos;    
    },(error)=>{
      this.departamentos = [];
    });
  }

  public getCiudades(dep_id:number):void{
   
    this._cotizacionService.getCiudades(dep_id).subscribe((ciudades:CiudadModel[])=>{
      this.ciudades = ciudades;    
    },(error)=>{
      this.ciudades = [];
    });
  }

  public getCiudadesDep(event: any){
    let dep_id = event.target.value;
    this.getCiudades(dep_id);
  }

  enviarCotizacion(){

    this._cotizacionService.enviarCotizacion(this.cliente).subscribe((resp:any)=>{ 
      this.exform.reset();
      alert(resp.message);
    },(error)=>{
      alert(error.error.message);
    });
  }


}
