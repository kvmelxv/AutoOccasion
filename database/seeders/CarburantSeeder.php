<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Carburant;

class CarburantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carburants = [
            'Essence',
            'Diesel',
            'Électrique'
        ];

        // Insérer chaque marque dans la base de données
        foreach ($carburants as $carburant) {
            Carburant::create(['nom' => $carburant]);
        }
    }
}