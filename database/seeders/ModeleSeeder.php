<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Marque;
use App\Models\Modele;

class ModeleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer toutes les marques
        $marques = Marque::all();

        // Définir les modèles pour chaque marque
        foreach ($marques as $marque) {
            $modeles = [];

            switch ($marque->nom) {
                case 'Acura':
                    $modeles = ['MDX', 'RDX', 'TLX', 'ILX'];
                    break;
                case 'Alfa Romeo':
                    $modeles = ['Giulia', 'Stelvio', '4C', 'Giulietta'];
                    break;
                case 'Audi':
                    $modeles = ['A3', 'A4', 'A5', 'A6', 'Q3', 'Q5', 'Q7'];
                    break;
                case 'BMW':
                    $modeles = ['3 Series', '5 Series', '7 Series', 'X1', 'X3', 'X5'];
                    break;
                // Ajoutez des cas pour chaque marque avec leurs modèles associés ici
                case 'Buick':
                    $modeles = ['Encore', 'Envision', 'Enclave', 'Regal'];
                    break;
                case 'Cadillac':
                    $modeles = ['ATS', 'CT4', 'CT5', 'CT6', 'XT4', 'XT5', 'XT6'];
                    break;
                case 'Chevrolet':
                    $modeles = ['Camaro', 'Corvette', 'Impala', 'Malibu', 'Tahoe', 'Suburban', 'Traverse'];
                    break;
                case 'Chrysler':
                    $modeles = ['300', 'Pacifica', 'Voyager'];
                    break;
                case 'Dodge':
                    $modeles = ['Charger', 'Challenger', 'Durango', 'Journey'];
                    break;
                case 'Fiat':
                    $modeles = ['500', '500X', '500L'];
                    break;
                case 'Ford':
                    $modeles = ['Mustang', 'Focus', 'Fusion', 'Escape', 'Explorer', 'Expedition'];
                    break;
                case 'Genesis':
                    $modeles = ['G70', 'G80', 'G90'];
                    break;
                case 'GMC':
                    $modeles = ['Acadia', 'Terrain', 'Yukon'];
                    break;
                case 'Honda':
                    $modeles = ['Accord', 'Civic', 'CR-V', 'Pilot', 'Odyssey'];
                    break;
                case 'Hyundai':
                    $modeles = ['Elantra', 'Sonata', 'Tucson', 'Santa Fe', 'Palisade'];
                    break;
                case 'Infiniti':
                    $modeles = ['Q50', 'Q60', 'QX50', 'QX60', 'QX80'];
                    break;
                case 'Jaguar':
                    $modeles = ['XE', 'XF', 'XJ', 'F-PACE', 'E-PACE', 'I-PACE'];
                    break;
                case 'Jeep':
                    $modeles = ['Wrangler', 'Grand Cherokee', 'Cherokee', 'Compass', 'Renegade'];
                    break;
                case 'Kia':
                    $modeles = ['Optima', 'Forte', 'Sorento', 'Sportage', 'Telluride'];
                    break;
                case 'Land Rover':
                    $modeles = ['Range Rover', 'Range Rover Sport', 'Range Rover Evoque', 'Discovery', 'Discovery Sport'];
                    break;
                case 'Lexus':
                    $modeles = ['ES', 'GS', 'IS', 'LS', 'NX', 'RX', 'GX', 'LX', 'RC', 'LC'];
                    break;
                case 'Lincoln':
                    $modeles = ['MKZ', 'Continental', 'Nautilus', 'Aviator', 'Navigator'];
                    break;
                case 'Maserati':
                    $modeles = ['Ghibli', 'Quattroporte', 'Levante'];
                    break;
                case 'Mazda':
                    $modeles = ['3', '6', 'CX-3', 'CX-5', 'CX-9'];
                    break;
                case 'Mercedes-Benz':
                    $modeles = ['C-Class', 'E-Class', 'S-Class', 'GLA', 'GLC', 'GLE', 'GLS'];
                    break;
                case 'MINI':
                    $modeles = ['Cooper', 'Clubman', 'Countryman', 'Convertible', 'Hardtop'];
                    break;
                case 'Mitsubishi':
                    $modeles = ['Mirage', 'Outlander', 'Eclipse Cross'];
                    break;
                case 'Nissan':
                    $modeles = ['Altima', 'Maxima', 'Sentra', 'Murano', 'Pathfinder', 'Rogue', 'Armada', 'Titan'];
                    break;
                case 'Porsche':
                    $modeles = ['911', 'Panamera', 'Cayenne', 'Macan', 'Taycan'];
                    break;
                case 'Ram':
                    $modeles = ['1500', '2500', '3500', 'Promaster City', 'Promaster'];
                    break;
                case 'Subaru':
                    $modeles = ['Impreza', 'Legacy', 'Outback', 'Forester', 'Crosstrek', 'Ascent'];
                    break;
                case 'Tesla':
                    $modeles = ['Model S', 'Model 3', 'Model X', 'Model Y'];
                    break;
                case 'Toyota':
                    $modeles = ['Camry', 'Corolla', 'Avalon', 'RAV4', 'Highlander', 'Sienna', 'Tacoma', 'Tundra'];
                    break;
                case 'Volkswagen':
                    $modeles = ['Jetta', 'Passat', 'Golf', 'Tiguan', 'Atlas'];
                    break;
                case 'Volvo':
                    $modeles = ['S60', 'S90', 'V60', 'V90', 'XC40', 'XC60', 'XC90'];
                    break;
                // Ajoutez des cas pour d'autres marques avec leurs modèles associés ici
                default:
                    $modeles = [];

            }

            foreach ($modeles as $modele) {
                Modele::create([
                    'nom' => $modele,
                    'marque_id' => $marque->id
                ]);
            }
        }
    }
}