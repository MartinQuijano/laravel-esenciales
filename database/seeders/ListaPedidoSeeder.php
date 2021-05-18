<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListaPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lista_pedidos')->insert([
            'pedido_id' => '1',
            'producto_id' => '1',
            'cantidad' => '3',
        ]);

        DB::table('lista_pedidos')->insert([
            'pedido_id' => '1',
            'producto_id' => '2',
            'cantidad' => '2',
        ]);
    }
}