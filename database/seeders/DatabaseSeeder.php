<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory()->create([
            'name'=> 'Erick Damian',
            'email'=> 'erick_casis1998@hotmail.com',
            'password'=> '159632100',
            'whatsapp'=> '0979005493',
        ]);
    }
}
