<?php

namespace App\Http\Controllers;

use App\Models\Carburant;
use Illuminate\Http\Request;


class CarburantController extends Controller
{


    public function index()
    {
        $carburants = Carburant::all();
        return view('carburant.index', ['carburants' => $carburants]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'carburant_fr' => 'required',
            'carburant_en' => 'required'
        ],
        [
            'carburant_fr.required' => 'le champ carburant en francais est obligatoire.',
            'carburant_en.required' => 'le champ carburant en anglais est obligatoire.'
        ]);

        $nom = [
            'fr' => $request->carburant_fr,
            'en' => $request->carburant_en
        ];

        $carburant = Carburant::create([
            'nom' => $nom
        ]);

        return redirect()->route('carburant.index')->with('success', 'Carburant Inseré avec succée.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carburant $carburant)
    {
        return view('carburant.edit', ['carburant' => $carburant]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carburant $carburant)
    {
        $request->validate([
            'carburant_fr' => 'required',
            'carburant_en' => 'required'
        ],
        [
            'carburant_fr.required' => 'le champ carburant en francais est obligatoire.',
            'carburant_en.required' => 'le champ carburant en anglais est obligatoire.'
        ]);

        $carburant->nom = [
            'fr' => $request->carburant_fr,
            'en' => $request->carburant_en
        ];

        $carburant->save();

        return redirect()->route('carburant.index')->with('success', 'Carburant modifié avec succée.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carburant $carburant)
    {
        $carburant->delete();
        return redirect()->route('carburant.index')->with('success', 'Carburant supprimé avec succée.');
    }
}
