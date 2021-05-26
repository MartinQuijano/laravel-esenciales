<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'cliente',
            'email' => 'cliente@gmail.com',
            'cliente_id' => '1',
            'role' => 'cliente',
            'password' => bcrypt('cliente'),
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'cliente_id' => '2',
            'role' => 'admin',
            'password' => bcrypt('admin'),
        ]);
    }
}