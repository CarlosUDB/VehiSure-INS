<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //calling the seeders
        $this->call([            
            InsurerSeeder::class,
            WorkshopSeeder::class,
            ProviderSeeder::class,
            CarPartSeeder::class,
            UserSeeder::class,
        ]);
    }
}
