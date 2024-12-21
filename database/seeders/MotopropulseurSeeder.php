<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Motopropulseur;

class MotopropulseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $motopropulseurs = [
            'FWD - Front-Wheel Drive',
            'RWD - Rear-Wheel Drive',
            'AWD - All-Wheel Drive',
            '4WD - Four-Wheel Drive'
        ];

        // Insérer chaque marque dans la base de données
        foreach ($motopropulseurs as $motopropulseur) {
            Motopropulseur::create(['nom' => $motopropulseur]);
        }
    }
}
