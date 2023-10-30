<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'name' => 'Carlos Carcamo',
            'email' => 'carlos.carcamo@pedia.com',
            'password' => bcrypt('seguro'),
            'insurer_id' => '1',
            'workshop_id' => null,            
        ]);

        User::firstOrCreate([
            'name' => 'Manuel Antonio',
            'email' => 'manuel.antonio@centro.com',
            'password' => bcrypt('seguro'),
            'insurer_id' => '2',
            'workshop_id' => null,
        ]);

        User::firstOrCreate([
            'name' => 'Ronald Leon',
            'email' => 'ronald.leon@pedia.com',
            'password' => bcrypt('taller'),
            'insurer_id' => null,
            'workshop_id' => '1',
        ]);

        User::firstOrCreate([
            'name' => 'Jose Leon',
            'email' => 'jose.leon@pedia.com',
            'password' => bcrypt('taller'),
            'insurer_id' => null,
            'workshop_id' => '2',
        ]);

        User::firstOrCreate([
            'name' => 'Marcelo Humberto',
            'email' => 'marcelo.humberto@centro.com',
            'password' => bcrypt('taller'),
            'insurer_id' => null,
            'workshop_id' => '3',
        ]);

        User::firstOrCreate([
            'name' => 'Mario Humberto',
            'email' => 'Mario.humberto@centro.com',
            'password' => bcrypt('taller'),
            'insurer_id' => null,
            'workshop_id' => '4',
        ]);
    }
}
