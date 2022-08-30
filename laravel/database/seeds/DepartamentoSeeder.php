<?php

use Illuminate\Database\Seeder;
use App\Departamento;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Departamento::create([
            'nombre' => 'Bogotá DC',
            'estado' => '1'
        ]);

        Departamento::create([
            'nombre' => 'Valle',
            'estado' => '1'
        ]);

        Departamento::create([
            'nombre' => 'Antioquia',
            'estado' => '1'
        ]);
       
    }
}
