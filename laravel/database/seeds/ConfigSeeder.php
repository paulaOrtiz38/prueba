<?php

use Illuminate\Database\Seeder;
use App\Config;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Config::create([
            'tipo' => 'correo',
            'correos' => 'jaguilar@processoft.com.co'
        ]);

        Config::create([
            'tipo' => 'correo',
            'correos' => 'jcastro@processoft.com.co'
        ]);

        Config::create([
            'tipo' => 'correo',
            'correos' => 'mahernandez@processoft.com.co'
        ]);
    }
}
