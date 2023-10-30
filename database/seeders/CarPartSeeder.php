<?php

namespace Database\Seeders;

use App\Models\CarPart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarPartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarPart::firstOrCreate([
            'name' => 'Defensa de Bumper Toyota Hilux 16-17 Con LED Con decoracion Cromada',
            'brand' => 'Toyota',
            'model' => 'Hilux 16-17',
            'price_per_unit' => '150',
            'provider_id' => '1'
        ]);

        CarPart::firstOrCreate([
            'name' => 'Defensa de Bumper Nissan Navara/NP300 15-17 Con Maya Metalica',
            'brand' => 'Nissan',
            'model' => 'NP300',
            'price_per_unit' => '181',
            'provider_id' => '1'
        ]);

        CarPart::firstOrCreate([
            'name' => 'Aleron Trasero Mitsubishi Lancer 08-16 Tipo Lip',
            'brand' => 'Mitsubishi',
            'model' => 'Lancer 08-16',
            'price_per_unit' => '34',
            'provider_id' => '2'
        ]);

        CarPart::firstOrCreate([
            'name' => 'Aleron Trasero Honda Civic 13-15 Con LED Con Flasher',
            'brand' => 'Honda',
            'model' => 'Civic 13-15',
            'price_per_unit' => '38',
            'provider_id' => '2'
        ]);

        CarPart::firstOrCreate([
            'name' => 'Retrovisor Honda Civic 96-00 Rh Sedan Manual Usa',
            'brand' => 'Honda',
            'model' => 'Civic 96-00',
            'price_per_unit' => '13',
            'provider_id' => '3'
        ]);

        CarPart::firstOrCreate([
            'name' => 'Kit Halogena Toyota Yaris 06-14 Sedan Derecho+Izquierdo',
            'brand' => 'Toyota',
            'model' => 'Yaris 06-14',
            'price_per_unit' => '52',
            'provider_id' => '3'
        ]);

        CarPart::firstOrCreate([
            'name' => 'Kit Halogena Toyota Yaris 06-14 Sedan Derecho+Izquierdo',
            'brand' => 'Toyota',
            'model' => 'Yaris 06-14',
            'price_per_unit' => '50',
            'provider_id' => '1'
        ]);

        
    }
}
