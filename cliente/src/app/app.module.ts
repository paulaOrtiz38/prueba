import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { AppComponent } from './app.component';
import { HttpClientModule} from '@angular/common/http';
import { ObjToArrayPipe } from './objToArray.pipe';
import { ProductosComponent } from './productos/productos.component';
import {Route, RouterModule} from '@angular/router';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { CotizacionComponent } from './cotizacion/cotizacion.component';
import { NgSelectModule } from '@ng-select/ng-select';


const routes: Route[] =[
    {path:'', component:CotizacionComponent},
    /* {path:'products', component:ProductosComponent}, */
    {path:'cotizacion', component:CotizacionComponent},
];

@NgModule({
  declarations: [
    AppComponent,
    ObjToArrayPipe,
    ProductosComponent,
    CotizacionComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    NgbModule,
    RouterModule.forRoot(routes),
    FormsModule,
    ReactiveFormsModule,
    NgSelectModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
