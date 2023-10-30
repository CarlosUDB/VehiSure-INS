<?php

namespace Database\Seeders;

use App\Models\Insurer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InsurerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Insurer::firstOrCreate([
            'name' => 'Seguros Pedia',
            'email' => 'pedia@pedia.com',
            'telephone' => '23235423',            
        ]);

        Insurer::firstOrCreate([
            'name' => 'Seguros Centro',
            'email' => 'seguros@centro.com',
            'telephone' => '25835443',
        ]);
    }
}
