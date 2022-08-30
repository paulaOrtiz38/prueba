<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ciudades')->insert([
            'nombre' => 'Bogota',
            'departamento_id' => 1,
            'estado' => '1'
        ]);

        DB::table('ciudades')->insert([
            'nombre' => 'Cali',
            'departamento_id' => 2,
            'estado' => '1'
        ]);
        DB::table('ciudades')->insert([
            'nombre' => 'Yumbo',
            'departamento_id' => 2,
            'estado' => '1'
        ]);
        DB::table('ciudades')->insert([
            'nombre' => 'Palmira',
            'departamento_id' => 2,
            'estado' => '1'
        ]);

        DB::table('ciudades')->insert([
            'nombre' => 'Medellin',
            'departamento_id' => 3,
            'estado' => '1'
        ]);
    }
}
