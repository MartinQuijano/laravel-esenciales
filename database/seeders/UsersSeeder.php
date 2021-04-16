<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        App\User::create(array(
  //          'email' => 'user@test.com',
            'name' => 'user',
            'password' => bcrypt('user')
        ));
    }
}
