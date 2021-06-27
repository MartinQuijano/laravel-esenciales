<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pedidos')->insert([
            'cliente_id' => '1',
            'fecha' => '05/03/2021',
            'estado' => 'procesando',
        ]);

        DB::table('pedidos')->insert([
            'cliente_id' => '1',
            'fecha' => '06/07/2021',
            'estado' => 'listo',
        ]);

        DB::table('pedidos')->insert([
            'cliente_id' => '1',
            'fecha' => '12/09/2021',
            'estado' => 'listo',
        ]);

        DB::table('pedidos')->insert([
            'cliente_id' => '2',
            'fecha' => '02/11/2021',
            'estado' => 'listo',
        ]);

        DB::table('pedidos')->insert([
            'cliente_id' => '2',
            'fecha' => '01/28/2021',
            'estado' => 'listo',
        ]);

        DB::table('pedidos')->insert([
            'cliente_id' => '2',
            'fecha' => '07/07/2021',
            'estado' => 'listo',
        ]);

        DB::table('pedidos')->insert([
            'cliente_id' => '2',
            'fecha' => '07/21/2021',
            'estado' => 'listo',
        ]);

        DB::table('pedidos')->insert([
            'cliente_id' => '1',
            'fecha' => '07/21/2021',
            'estado' => 'listo',
        ]);
    }
}