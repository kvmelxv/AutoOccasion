<?php

namespace App\Http\Controllers;

use App\Models\Couleur;
use Illuminate\Http\Request;

class CouleurController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $couleurs = Couleur::all();
        return view('couleur.index', ['couleurs' => $couleurs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'couleur_fr' => 'required',
            'couleur_en' => 'required'
        ],
        [
            'couleur_fr.required' => 'le champ couleur en francais est obligatoire.',
            'couleur_en.required' => 'le champ couleur en anglais est obligatoire.'
        ]);

        $nom = [
            'fr' => $request->couleur_fr,
            'en' => $request->couleur_en
        ];

        $couleur = Couleur::create([
            'nom' => $nom
        ]);

        return redirect()->route('couleur.index')->with('success', 'Couleur Inseré avec succée.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Couleur $couleur)
    {
        return view('couleur.edit', ['couleur' => $couleur]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Couleur $couleur)
    {
        $request->validate([
            'couleur_fr' => 'required',
            'couleur_en' => 'required'
        ],
        [
            'couleur_fr.required' => 'le champ couleur en francais est obligatoire.',
            'couleur_en.required' => 'le champ couleur en anglais est obligatoire.'
        ]);

        $couleur->nom = [
            'fr' => $request->couleur_fr,
            'en' => $request->couleur_en
        ];

        $couleur->save();

        return redirect()->route('couleur.index')->with('success', 'Couleur modifié avec succée.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Couleur $couleur)
    {
        $couleur->delete();
        return redirect()->route('couleur.index')->with('success', 'Couleur supprimé avec succée.');
    }
}

