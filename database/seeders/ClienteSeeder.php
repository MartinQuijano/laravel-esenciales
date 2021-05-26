<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'nombre' => 'pepe',
            'apellido' => 'koding',
            'direccion' => 'roca 142',
            'ciudad' => 'neuquen',
            'telefono' => '02914863527',
        ]);

        DB::table('clientes')->insert([
            'nombre' => 'juan',
            'apellido' => 'datagram',
            'direccion' => 'estomba 1423',
            'ciudad' => 'oriente',
            'telefono' => '02914827291',
        ]);
    }
}