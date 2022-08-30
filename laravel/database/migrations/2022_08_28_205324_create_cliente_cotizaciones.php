<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteCotizaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        //tabla departamentos
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->char('estado',1)->default('1');

            $table->timestamps();
        });
        
        //tabla ciudades
        Schema::create('ciudades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->char('estado',1)->default('1');

            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id')->references('id')->on('departamentos');

            $table->timestamps();
        });
        
        //tabla clientes
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->string('email',100);
            $table->string('celular',11);
            $table->char('acepta_terminos',1)->default('0');
            $table->char('estado',1)->default('1');
            $table->date('fecha_registro');

            $table->unsignedBigInteger('ciudad_id');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->timestamps();
        });

        //tabla cotizaciones
        Schema::create('cliente_cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->text('datos_modelo');
            $table->date('fecha_cotizacion');
            $table->char('correo_enviado')->default('0');

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->timestamps();
        });

        //tabla config correos
        Schema::create('config', function (Blueprint $table) {
            $table->id();
            $table->string('tipo',100);
            $table->text('correos');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamentos');
        Schema::dropIfExists('ciudades');
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('cliente_cotizaciones');
        Schema::dropIfExists('config');
    }
}
