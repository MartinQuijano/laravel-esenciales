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
        $oreo = base64_encode(file_get_contents('https://http2.mlstatic.com/D_NQ_NP_644885-MLA44926273647_022021-V.jpg'));
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
            'imagen' => $oreo,
            'estado' => 'activo',
        ]);

        $pepas = base64_encode(file_get_contents('https://almacenonline.com.ar/wp-content/uploads/2020/03/galletitastriopepas.jpg'));
        DB::table('productos')->insert([
            'marca' => 'Pepas Trio',
            'categoria' => 'Galletitas',
            'cantidad' => '12',
            'precio' => '20.00',
            'unidad' => 'unidad',
            'descripcion' => 'Galletitas dulces con dulce de membrillo',
            'ingredientes' => 'Harina de Trigo “000” enriquecida según Ley 25630*, mermelada de membrillo COL:(INS 129), CONS: (INS330), 
            oleomargarina refinada, azúcar, almidón de maíz, leche entera en polvo, AROMATIZANTE/SABORIZANTE a vainilla, EMU: (INS 322), RAI: (INS503ii), COL: (INS100i, INS 160b)',
            'imagen' => $pepas,
            'estado' => 'activo',
        ]);

        $criollitas = base64_encode(file_get_contents('https://www.bmart.com.ar/img/articulos/galletitas_criollitas_imagen1.jpg'));
        DB::table('productos')->insert([
            'marca' => 'Criollitas Original',
            'categoria' => 'Galletitas',
            'cantidad' => '22',
            'precio' => '45.00',
            'unidad' => 'unidad',
            'descripcion' => 'Galletitas de agua',
            'ingredientes' => 'Harina de trigo, grasa bovina, sal, extracto de malta, jarabe de glucosa, levadura, leudante químico (bicarbonato de sodio), emulsionante (lecitina de soja). Alérgenos: trigo, gluten, cebada, soja, trazas de almendra, avena, centeno, huevo, leche, maní y sésamo.',
            'imagen' => $criollitas,
            'estado' => 'activo',
        ]);

        $bananas = base64_encode(file_get_contents('https://media.istockphoto.com/photos/banana-picture-id1184345169?k=6&m=1184345169&s=612x612&w=0&h=I159iiNId_-XwGsoZlpi9WyeACv8kpg-EmyB5X2oo30='));
        DB::table('productos')->insert([
            'marca' => 'Bananas Ecuador',
            'categoria' => 'Frutas',
            'cantidad' => '40',
            'precio' => '25',
            'unidad' => 'kg',
            'descripcion' => '',
            'ingredientes' => '',
            'imagen' => $bananas,
            'estado' => 'activo',
        ]);

        $duraznos = base64_encode(file_get_contents('https://storage.googleapis.com/portalfruticola/2018/05/a1cf9a68-durazno-shutterstock_360348911-e1584379374484.jpg'));
        DB::table('productos')->insert([
            'marca' => 'Duraznos',
            'categoria' => 'Frutas',
            'cantidad' => '10',
            'precio' => '80',
            'unidad' => 'kg',
            'descripcion' => 'Duraznos',
            'ingredientes' => '',
            'imagen' => $duraznos,
            'estado' => 'activo',
        ]);

        DB::table('productos')->insert([
            'marca' => 'Sin_imagen_test',
            'categoria' => 'Frutas',
            'cantidad' => '10',
            'precio' => '15',
            'unidad' => 'kg',
            'descripcion' => 'Fruta sin imagen para test de placeholder.',
            'ingredientes' => '',
            'imagen' => null,
            'estado' => 'activo',
        ]);

        $sprite = base64_encode(file_get_contents('https://statics.dinoonline.com.ar/imagenes/full_600x600_ma/3080021_f.jpg'));
        DB::table('productos')->insert([
            'marca' => 'Sprite',
            'categoria' => 'Bebida',
            'cantidad' => '50',
            'precio' => '120',
            'unidad' => 'unidad',
            'descripcion' => 'Bebida gaseosa con sabor a Lima limón.',
            'ingredientes' => 'Agua carbonatada, azúcar, ácido cítrico, saborizante natural, 
            citrato de sodio, benzoato de sodio, sucralosa y acesulfamo de potasio.',
            'imagen' => $sprite,
            'estado' => 'activo',
        ]);

        $eco = base64_encode(file_get_contents('https://ardiaprod.vteximg.com.br/arquivos/ids/184878-1000-1000/Agua-Mineral-sin-Gas-Eco-de-los-Andes-2-Lts-_1.jpg?v=637427552887200000'));
        DB::table('productos')->insert([
            'marca' => 'Agua Eco de los andes',
            'categoria' => 'Bebida',
            'cantidad' => '40',
            'precio' => '100',
            'unidad' => 'unidad',
            'descripcion' => 'Agua.',
            'ingredientes' => 'Agua.',
            'imagen' => $eco,
            'estado' => 'activo',
        ]);

        $termaC = base64_encode(file_get_contents('https://statics.dinoonline.com.ar/imagenes/full_600x600_ma/3051716_f.jpg'));
        DB::table('productos')->insert([
            'marca' => 'Terma Citrus',
            'categoria' => 'Bebida',
            'cantidad' => '20',
            'precio' => '80',
            'unidad' => 'unidad',
            'descripcion' => 'Terma Citrus Hierbabuena y Enebro.',
            'ingredientes' => '',
            'imagen' => $termaC,
            'estado' => 'activo',
        ]);

        $termaP = base64_encode(file_get_contents('https://jumboargentina.vteximg.com.br/arquivos/ids/600795-1000-1000/Amargo-Terma-Pomelo-Rosado-1-75-L-1-30477.jpg?v=637348303655870000'));
        DB::table('productos')->insert([
            'marca' => 'Terma Pomelo Rosado',
            'categoria' => 'Bebida',
            'cantidad' => '20',
            'precio' => '80',
            'unidad' => 'unidad',
            'descripcion' => 'Terma Pomelo Rosado Peperina y Coriandro.',
            'ingredientes' => '',
            'imagen' => $termaP,
            'estado' => 'activo',
        ]);

    }
}