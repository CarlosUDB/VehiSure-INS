<?php

namespace Database\Seeders;

use App\Models\Workshop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Workshop::firstOrCreate([
            'name' => 'Taller Jose',
            'email' => 'jose.taller@pedia.com',
            'telephone' => '73239493',
            'address' => 'test1',
            'insurer_id' => '1'
        ]);

        Workshop::firstOrCreate([
            'name' => 'Taller Manuel',
            'email' => 'manuel.taller@pedia.com',
            'telephone' => '74469493',
            'address' => 'test2',
            'insurer_id' => '1'
        ]);

        Workshop::firstOrCreate([
            'name' => 'Taller Daniel',
            'email' => 'daniel.taller@centro.com',
            'telephone' => '76769493',
            'address' => 'test3',
            'insurer_id' => '2'
        ]);

        Workshop::firstOrCreate([
            'name' => 'Taller Antonio',
            'email' => 'antonio.taller@centro.com',
            'telephone' => '76569223',
            'address' => 'test4',
            'insurer_id' => '2'
        ]);
    }
}
