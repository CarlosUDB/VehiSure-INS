<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Provider::firstOrCreate([
            'name' => 'INSA providers',
            'email' => 'contact@insa.com',
            'telephone' => '24435476',
            'address' => 'test1'            
        ]);

        Provider::firstOrCreate([
            'name' => 'TELU providers',
            'email' => 'contact@telu.com',
            'telephone' => '25439976',
            'address' => 'test2'
        ]);

        Provider::firstOrCreate([
            'name' => 'ADW providers',
            'email' => 'contact@adw.com',
            'telephone' => '27739476',
            'address' => 'test3'
        ]);
    }
}
