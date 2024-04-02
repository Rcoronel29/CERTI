<?php

namespace Database\Seeders;

use App\Models\User; 

use Illuminate\Database\Seeder;


class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Limber Cesar R B',
            'email' => 'limber@gmail.com',
            'password' => bcrypt('12345678'),
            'cargo' => 'No',
            'estado' => '1',
            'dni' => '12345678',
        ])->assignRole('Admin');
         
    }
}