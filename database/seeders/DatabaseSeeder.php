<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);

        User::factory()->create([
            'name'=> 'Erick Damian',
            'email'=> 'erick_casis1998@hotmail.com',
            'password'=> Hash::make('159632100'),
            'whatsapp'=> '0979005493',
        ])->assignRole('admin');
    }
}
