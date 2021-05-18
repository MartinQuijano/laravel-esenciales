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
            'name' => 'test_name',
            'email' => 'test@gmail.com',
            'cliente_id' => '1',
            'role' => 'cliente',
            'password' => bcrypt('test'),
        ]);

        DB::table('users')->insert([
            'name' => 'test2_name',
            'email' => 'test2@gmail.com',
            'cliente_id' => '2',
            'role' => 'admin',
            'password' => bcrypt('test2'),
        ]);
    }
}