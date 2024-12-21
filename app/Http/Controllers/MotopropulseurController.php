<?php

namespace App\Http\Controllers;

use App\Models\Motopropulseur;
use Illuminate\Http\Request;

class MotopropulseurController extends Controller
{
    public function index()
    {
        $motopropulseurs = Motopropulseur::all();
        return view('motopropulseur.index', ['motopropulseurs' => $motopropulseurs]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'motopropulseur_fr' => 'required',
            'motopropulseur_en' => 'required'
        ],
        [
            'motopropulseur_fr.required' => 'le champ motopropulseur en francais est obligatoire.',
            'motopropulseur_en.required' => 'le champ motopropulseur en anglais est obligatoire.'
        ]);

        $nom = [
            'fr' => $request->motopropulseur_fr,
            'en' => $request->motopropulseur_en
        ];

        $motopropulseur = Motopropulseur::create([
            'nom' => $nom
        ]);

        return redirect()->route('motopropulseur.index')->with('success', 'Motopropulseur Inseré avec succée.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Motopropulseur $motopropulseur)
    {
        return view('motopropulseur.edit', ['motopropulseur' => $motopropulseur]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Motopropulseur $motopropulseur)
    {
        $request->validate([
            'motopropulseur_fr' => 'required',
            'motopropulseur_en' => 'required'
        ],
        [
            'motopropulseur_fr.required' => 'le champ motopropulseur en francais est obligatoire.',
            'motopropulseur_en.required' => 'le champ motopropulseur en anglais est obligatoire.'
        ]);

        $motopropulseur->nom = [
            'fr' => $request->motopropulseur_fr,
            'en' => $request->motopropulseur_en
        ];

        $motopropulseur->save();

        return redirect()->route('motopropulseur.index')->with('success', 'Motopropulseur modifié avec succée.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Motopropulseur $motopropulseur)
    {
        $motopropulseur->delete();
        return redirect()->route('motopropulseur.index')->with('success', 'Motopropulseur supprimé avec succée.');
    }
}
