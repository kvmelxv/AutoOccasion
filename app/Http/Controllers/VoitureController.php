<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* use Illuminate\Http\UploadedFile; */
use App\Models\Voiture;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Transmission;
use App\Models\Motopropulseur;
use App\Models\Carburant;
use App\Models\Couleur;
use App\Models\Photo;
use Spatie\Permission\Models\Role;


class VoitureController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marques = Marque::all();
        $modeles = Modele::all();
        $motopropulseurs = Motopropulseur::all();
        $transmissions = Transmission::all();
        $carburants = Carburant::all();
        $couleurs = Couleur::all();

        $voitures = Voiture::select()
            ->orderby('id', 'desc')
            ->simplePaginate(24);

        return view('voiture.index', compact('voitures'), [

            'marques' => $marques,
            'modeles' => $modeles,
            'motopropulseurs' => $motopropulseurs,
            'transmissions' => $transmissions,
            'carburants' => $carburants,
            'couleurs' => $couleurs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create-car');

        $marques = Marque::all();
        $modeles = Modele::all();
        $motopropulseurs = Motopropulseur::all();
        $transmissions = Transmission::all();
        $carburants = Carburant::all();
        $couleurs = Couleur::all();

        return view(
            'voiture.create',
            [
                'marques' => $marques,
                'modeles' => $modeles,
                'motopropulseurs' => $motopropulseurs,
                'transmissions' => $transmissions,
                'carburants' => $carburants,
                'couleurs' => $couleurs
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create-car');
        $request->validate(
        [
            'description_en' => 'required|string|max:500',
            'description_fr' => 'required|string|max:500',
            'date_arrivee' => 'required|date',
            'prix_payee' => 'required',
            'annee' => 'required|min:4|max:4',
            'kilometrage' => 'required',
            'marque' => 'required',
            'modele_id' => 'required|exists:modeles,id',
            'motopropulseur_id' => 'required|exists:motopropulseurs,id',
            'carburant_id' => 'required|exists:carburants,id',
            'transmission_id' => 'required|exists:transmissions,id',
            'couleur_id' => 'required|exists:couleurs,id',
            'photo' => 'required'
            /* 'photo' => 'required|file|mimes:jpg,png' */

        ],
    
        [
            'description_en.required' => 'Entrez une description en anglais',
            'description_en.max' => 'La description en anglais doit etre inferieur a 500 caracteres',

            'description_fr.required' => 'Entrez une description en francais',
            'description_fr.max' => 'La description en francais doit etre inferieur a 500 caracteres',

                'description_fr.required' => 'Entrez une description en francais',
                'description_fr.max' => 'La description en francais doit etre inferieur a 250 caracteres',

                'date_arrivee.required' => "Entrez la date d'arrivée du véhicule",
                'date_arrivee.date' => "Entrez une date valide",

                'prix_payee.required' => 'Entrez le prix payé pour le véhicule',

                'annee.required' => "Entrez l'année du véhicule",
                'annee.min' => 'Entrez une année valide',
                'annee.max' => 'Entrez une année valide',

                'kilometrage.required' => 'Entrex le kilometrage du véhicule',

                'marque.required' => 'Selectionnez une marque',
                'modele_id.required' => 'Selectionnez un modele',
                'motopropulseur_id.required' => 'Selectionnez un groupe motopropulseur',
                'carburant_id.required' => 'Selectionnez un type de carburant',
                'transmission_id.required' => 'Selectionnez une transmission',
                'couleur_id.required' => 'Selectionnez une couleur',
                'photo.required' => 'Entrez des photos du véhicule',

            ]
        );

        $description = [
            'en' => $request->description_en,
            'fr' => $request->description_fr,
        ];

        $vehicule = Voiture::create([

            'description' => $description,
            'date_arrivee' => $request->date_arrivee,
            'prix_payee' => $request->prix_payee,
            'annee' => $request->annee,
            'kilometrage' => $request->kilometrage,
            'modele_id' => $request->modele_id,
            'motopropulseur_id' => $request->motopropulseur_id,
            'carburant_id' => $request->carburant_id,
            'transmission_id' => $request->transmission_id,
            'couleur_id' => $request->couleur_id

        ]);

        // systeme d'ajout de photo
        if ($request->hasFile('photo')) {

            $photos = $request->file('photo');

            $firstIteration = true;

            foreach ($photos as $index => $photo) {

                // les img seront stocker dans storage/app/public ...
                $path = $photo->store('assets/img/vehicules', 'public');


                $vehicule->photos()->create([
                    'path' => $path,
                    'est_principale' => $firstIteration,
                ]);

                $firstIteration = false;
            }
        }

        /* $prixDeVente = $vehicule->prixDeVente();
        return $prixDeVente; */

        return redirect()->route('home')->with('success', 'voiture crée avec succée');
    }

    /**
     * Display the specified resource.
     */
    public function show(Voiture $voiture)
    {
        // Récupérer les photos liées à cette voiture
        $photos = $voiture->photos;

        return view('voiture.show', ['voiture' => $voiture, 'photos' => $photos]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voiture $voiture)
    {
        $this->authorize('edit-car');

        $marques = Marque::all();
        $modeles = Modele::all();
        $motopropulseurs = Motopropulseur::all();
        $transmissions = Transmission::all();
        $carburants = Carburant::all();
        $couleurs = Couleur::all();
        $photos = Photo::all();

        return view(
            'voiture.edit',
            [
                'voiture' => $voiture,
                'marques' => $marques,
                'modeles' => $modeles,
                'motopropulseurs' => $motopropulseurs,
                'transmissions' => $transmissions,
                'carburants' => $carburants,
                'couleurs' => $couleurs,
                'photos' => $photos
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voiture $voiture)
    {
        $this->authorize('edit-car');
        $request->validate([

            'description_en' => 'required|string|max:500',
            'description_fr' => 'required|string|max:500',
            'date_arrivee' => 'required|date',
            'prix_payee' => 'required',
            'annee' => 'required|min:4|max:4',
            'kilometrage' => 'required',
            /* 'marque' => 'required', */
            'modele_id' => 'required|exists:modeles,id',
            'motopropulseur_id' => 'required|exists:motopropulseurs,id',
            'carburant_id' => 'required|exists:carburants,id',
            'transmission_id' => 'required|exists:transmissions,id',
            'couleur_id' => 'required|exists:couleurs,id',
        ]);

        $voiture->description = [
            'en' => $request->description_en,
            'fr' => $request->description_fr
        ];
        $voiture->date_arrivee = $request->date_arrivee;
        $voiture->prix_payee = $request->prix_payee;
        $voiture->annee = $request->annee;
        $voiture->kilometrage = $request->kilometrage;
        $voiture->modele_id = $request->modele_id;
        $voiture->motopropulseur_id = $request->motopropulseur_id;
        $voiture->carburant_id = $request->carburant_id;
        $voiture->transmission_id = $request->transmission_id;
        $voiture->couleur_id = $request->couleur_id;

        $voiture->save();

        // Traitement des nouvelles photos
        if ($request->hasFile('photo')) {
            $nouvellesPhotos = $request->file('photo');

            foreach ($nouvellesPhotos as $nouvellePhoto) {
                $path = $nouvellePhoto->store('assets/img/vehicules', 'public');

                // Lier la nouvelle photo à la voiture existante
                $voiture->photos()->create([
                    'path' => $path,
                    'est_principale' => false, // Assurez-vous de définir est_principale selon vos besoins
                ]);
            }
        }

        return redirect()->route('home')->with('success', 'voiture Modifier avec succée !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voiture $voiture)
    {
        $this->authorize('delete-car');
        // Supprimer toutes les photos associées à cette voiture
        $voiture->photos()->delete();

        $voiture->delete();
        return redirect()->route('home')->with('success', 'voiture supprimée avec succée !');
    }

    public function crm()
    {
        $this->authorize('edit-car');


        $this->authorize('create-car');

        $voitures = Voiture::all();
        $marques = Marque::all();
        $modeles = Modele::all();
        $motopropulseurs = Motopropulseur::all();
        $transmissions = Transmission::all();
        $carburants = Carburant::all();
        $couleurs = Couleur::all();

        return view(
            'voiture.crm',
            [
                'voitures' => $voitures,
                'marques' => $marques,
                'modeles' => $modeles,
                'motopropulseurs' => $motopropulseurs,
                'transmissions' => $transmissions,
                'carburants' => $carburants,
                'couleurs' => $couleurs
            ]
        );

    }

    public function filtrage(Request $request){
        
        /* return $request; */
        // Initialisez une requête de base pour la récupération des données
        $query = Voiture::query();

        // Filtrer par modele si un modele est sélectionné
        if ($request->filled('marque_id')) {
            $marque_id = $request->marque_id;
            // Sélectionnez les modèles ayant cette marque
            $modeles = Modele::where('marque_id', $marque_id)->pluck('id');
            // Filtrez les voitures ayant un modèle qui correspond à ces modèles
            $query->whereIn('modele_id', $modeles);  

        }

        /* // Filtrer par modèle si un modèle est sélectionné
        if ($request->filled('modele_id')) {
            $modele_id = $request->input('modele_id');
            // Filtrer les voitures ayant le modèle sélectionné
            $query->where('modele_id', $modele_id);
        } */

        if ($request->filled('prix')) {
            $prix = $request->input('prix');
            $tableauPrix = explode('-', $prix);
            /// Utilisez une expression SQL personnalisée pour calculer le prix de vente dans la requête
            $query->whereBetween(\DB::raw("prix_payee + (prix_payee * 0.25)"), [$tableauPrix[0], $tableauPrix[1]]);
        }

        // Filtrer par kilometrage si une plage de kilometrage est sélectionnée
        if ($request->filled('kilometrage')) {
          $kilometrage = $request->input('kilometrage');
          $tableauKilometrage = explode('-', $kilometrage);
          $query->whereBetween('kilometrage', [$tableauKilometrage[0] + 1, $tableauKilometrage[1]]);
        }
          
         

        // Filtrer par annee si une annee est sélectionné
        if ($request->filled('annee')) {
            $annee = $request->input('annee');
            $query->where('annee', $annee); 
        }

        // Filtrer par transmission si une transmission est sélectionné
        if ($request->filled('transmission_id')) {
            $query->where('transmission_id', $request->input('transmission_id'));
            
        }

        // Filtrer par carburant si un carburant est sélectionné
        if ($request->filled('carburant_id')) {
            $query->where('carburant_id', $request->input('carburant_id'));
        }

        // Filtrer par motopropulseur si un motopropulseur est sélectionné
        if ($request->filled('motopropulseur_id')) {
            $query->where('motopropulseur_id', $request->input('motopropulseur_id'));
        }

        // Filtrer par couleur si une couleur est sélectionné
        if ($request->filled('couleur_id')) {
            $query->where('couleur_id', $request->input('couleur_id'));
        }

        $resultats = $query->get();

        // Modifier la structure des données pour inclure les noms des modèles et des marques
        $voitures = $resultats->map(function ($voiture) {
          return [        
    
            'id' => $voiture->id,
            'marque' => $voiture->modele->marque->nom,
            'modele' => $voiture->modele->nom,
            'annee' => $voiture->annee,
            'kilometrage' =>$voiture->kilometrage,
            'prix' => $voiture->prixDeVente(),
            'transmission' => $voiture->transmission->nom, 
            'carburant' => $voiture->carburant->nom, 
            'motopropulseur' => $voiture->motopropulseur->nom, 
            'couleur' => $voiture->couleur->nom,
            'photo_path' => asset('storage/' . $voiture->photos->first()->path), // Chemin de l'image
            
          ];
        });

        return response()->json($voitures);
    }
}


