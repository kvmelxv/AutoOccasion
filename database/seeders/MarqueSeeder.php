<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Marque;

class MarqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marques = [
            'Acura',
            'Alfa Romeo',
            'Audi',
            'BMW',
            'Buick',
            'Cadillac',
            'Chevrolet',
            'Chrysler',
            'Dodge',
            'Fiat',
            'Ford',
            'Genesis',
            'GMC',
            'Honda',
            'Hyundai',
            'Infiniti',
            'Jaguar',
            'Jeep',
            'Kia',
            'Land Rover',
            'Lexus',
            'Lincoln',
            'Maserati',
            'Mazda',
            'Mercedes-Benz',
            'MINI',
            'Mitsubishi',
            'Nissan',
            'Porsche',
            'Ram',
            'Subaru',
            'Tesla',
            'Toyota',
            'Volkswagen',
            'Volvo'
        ];

        // Insérer chaque marque dans la base de données
        foreach ($marques as $marque) {
            Marque::create(['nom' => $marque]);
        }
    }
}
