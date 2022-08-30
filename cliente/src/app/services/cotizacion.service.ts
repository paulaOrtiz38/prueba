import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { map, Observable } from 'rxjs';
import { environment } from 'src/environments/environment';
import { CiudadModel } from '../models/ciudad.model';
import { ClienteModel } from '../models/cliente.model';
import { DepartamentoModel } from '../models/departamento.model';

const URL = environment.base;

@Injectable({
  providedIn: 'root'
})
export class CotizacionService {

  private modelosUrl = "https://integrador.processoft.com.co/api/menutest"; // URL to web api

  constructor(private http:HttpClient) { }

  public getDepartamentos(): Observable<DepartamentoModel[]> {
    return this.http.get<DepartamentoModel[]>(`${URL}/departamentos`).pipe(
      map((resp: any) => resp.data)
    );
  }

  public getCiudades(dep_id:number): Observable<CiudadModel[]> {
    return this.http.get<CiudadModel[]>(`${URL}/ciudades/${dep_id}`).pipe(
      map((resp: any) => resp.data)
    );
  }

  public enviarCotizacion(cliente:ClienteModel){
    return this.http.post<any>(`${URL}/cliente`,cliente).pipe(
      map((resp: any) => resp)
    );

  }
  
  public getModelos(): Observable<any> {
    return this.http.get<any>(this.modelosUrl);
  }
}
