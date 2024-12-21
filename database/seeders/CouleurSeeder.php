<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Couleur;

class CouleurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $couleurs = [
            "Blanc",
            "Blanc pur",
            "Blanc nacré",
            "Blanc glacier",
            "Blanc ivoire",
            "Noir",
            "Noir solide",
            "Noir métallisé",
            "Noir brillant",
            "Gris",
            "Gris foncé",
            "Gris clair",
            "Gris métallisé",
            "Gris anthracite",
            "Argent",
            "Argent métallisé",
            "Argent brillant",
            "Argent satiné",
            "Bleu",
            "Bleu foncé",
            "Bleu clair",
            "Bleu marine",
            "Bleu métallisé",
            "Rouge",
            "Rouge vif",
            "Rouge foncé",
            "Rouge métallisé",
            "Rouge rubis",
            "Vert",
            "Vert foncé",
            "Vert clair",
            "Vert métallisé",
            "Vert olive",
            "Jaune",
            "Jaune vif",
            "Jaune pâle",
            "Jaune citron",
            "Orange",
            "Orange vif",
            "Orange métallisé",
            "Marron",
            "Brun foncé",
            "Brun clair",
            "Brun métallisé",
            "Beige",
            "Beige métallisé",
            "Beige foncé",
            "Violet",
            "Violet foncé",
            "Violet clair",
            "Rose",
            "Rose pâle",
            "Rose vif"
        ];

        // Insérer chaque marque dans la base de données
        foreach ($couleurs as $couleur) {
            Couleur::create(['nom' => $couleur]);
        }
    }
}

/* php artisan db:seed --class=CouleurSeeder */
