<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transmission;

class TransmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transmissions = [
            'Manuelle',
            'Automatique'
        ];

        // Insérer chaque marque dans la base de données
        foreach ($transmissions as $transmission) {
            Transmission::create(['nom' => $transmission]);
        }
    }
}
