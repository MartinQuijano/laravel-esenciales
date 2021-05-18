<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'marca' => 'Oreo',
            'categoria' => 'Galletitas',
            'cantidad' => '25',
            'precio' => '12.75',
            'unidad' => 'unidad',
            'descripcion' => 'Galletas de cacao rellenas de crema sabor vainilla.',
            'ingredientes' => 'Harina de TRIGO, azúcar, grasa de palma, aceite de nabina, cacao magro en polvo 4,5 %, almidón de
            TRIGO, jarabe de glucosa y fructosa, gasificantes (carbonatos de potasio, carbonatos de amonio, carbonatos de sodio), sal, emulgentes
            (lecitina de SOJA, lecitina de girasol), aroma. PUEDE CONTENER LECHE.',
            'imagen' => null,
        ]);

        DB::table('productos')->insert([
            'marca' => 'Pepas Trio',
            'categoria' => 'Galletitas',
            'cantidad' => '12',
            'precio' => '20.00',
            'unidad' => 'unidad',
            'descripcion' => 'Galletitas dulces con dulce de membrillo',
            'ingredientes' => 'Harina de Trigo “000” enriquecida según Ley 25630*, mermelada de membrillo COL:(INS 129), CONS: (INS330), 
            oleomargarina refinada, azúcar, almidón de maíz, leche entera en polvo, AROMATIZANTE/SABORIZANTE a vainilla, EMU: (INS 322), RAI: (INS503ii), COL: (INS100i, INS 160b)',
            'imagen' => null,
        ]);

        DB::table('productos')->insert([
            'marca' => 'Bananas Ecuador',
            'categoria' => 'Frutas',
            'cantidad' => '40',
            'precio' => '25',
            'unidad' => 'kg',
            'descripcion' => '',
            'ingredientes' => '',
            'imagen' => null,
        ]);

        DB::table('productos')->insert([
            'marca' => 'Sprite',
            'categoria' => 'Bebida',
            'cantidad' => '50',
            'precio' => '120',
            'unidad' => 'unidad',
            'descripcion' => 'Bebida gaseosa con sabor a Lima limón.',
            'ingredientes' => 'Agua carbonatada, azúcar, ácido cítrico, saborizante natural, 
            citrato de sodio, benzoato de sodio, sucralosa y acesulfamo de potasio.',
            'imagen' => null,
        ]);

    }
}