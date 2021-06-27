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

        DB::table('lista_pedidos')->insert([
            'pedido_id' => '1',
            'producto_id' => '3',
            'cantidad' => '5',
        ]);

        DB::table('lista_pedidos')->insert([
            'pedido_id' => '2',
            'producto_id' => '1',
            'cantidad' => '3',
        ]);

        DB::table('lista_pedidos')->insert([
            'pedido_id' => '2',
            'producto_id' => '2',
            'cantidad' => '2',
        ]);

        DB::table('lista_pedidos')->insert([
            'pedido_id' => '2',
            'producto_id' => '3',
            'cantidad' => '5',
        ]);

        DB::table('lista_pedidos')->insert([
            'pedido_id' => '2',
            'producto_id' => '5',
            'cantidad' => '3',
        ]);

        DB::table('lista_pedidos')->insert([
            'pedido_id' => '2',
            'producto_id' => '6',
            'cantidad' => '2',
        ]);

        DB::table('lista_pedidos')->insert([
            'pedido_id' => '2',
            'producto_id' => '8',
            'cantidad' => '5',
        ]);

        DB::table('lista_pedidos')->insert([
            'pedido_id' => '3',
            'producto_id' => '9',
            'cantidad' => '3',
        ]);

        DB::table('lista_pedidos')->insert([
            'pedido_id' => '3',
            'producto_id' => '10',
            'cantidad' => '2',
        ]);

        DB::table('lista_pedidos')->insert([
            'pedido_id' => '3',
            'producto_id' => '7',
            'cantidad' => '5',
        ]);

        DB::table('lista_pedidos')->insert([
            'pedido_id' => '4',
            'producto_id' => '4',
            'cantidad' => '2',
        ]);

        DB::table('lista_pedidos')->insert([
            'pedido_id' => '5',
            'producto_id' => '3',
            'cantidad' => '9',
        ]);

        DB::table('lista_pedidos')->insert([
            'pedido_id' => '6',
            'producto_id' => '7',
            'cantidad' => '3',
        ]);

        DB::table('lista_pedidos')->insert([
            'pedido_id' => '7',
            'producto_id' => '2',
            'cantidad' => '4',
        ]);

        DB::table('lista_pedidos')->insert([
            'pedido_id' => '8',
            'producto_id' => '1',
            'cantidad' => '4',
        ]);

    }
}