<?php

namespace App\Http\Controllers;

use App\Models\Transmission;
use Illuminate\Http\Request;

class TransmissionController extends Controller
{
    public function index()
    {
        $transmissions = Transmission::all();
        return view('transmission.index', ['transmissions' => $transmissions]); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'transmission_fr' => 'required',
            'transmission_en' => 'required'
        ],
        [
            'transmission_fr.required' => 'le champ transmission en francais est obligatoire.',
            'transmission_en.required' => 'le champ transmission en anglais est obligatoire.'
        ]);

        $nom = [
            'fr' => $request->transmission_fr,
            'en' => $request->transmission_en
        ];

        $transmission = Transmission::create([
            'nom' => $nom
        ]);

        return redirect()->route('transmission.index')->with('success', 'Transmission Inseré avec succée.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transmission $transmission)
    {
        return view('transmission.edit', ['transmission' => $transmission]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transmission $transmission)
    {
        $request->validate([
            'transmission_fr' => 'required',
            'transmission_en' => 'required'
        ],
        [
            'transmission_fr.required' => 'le champ transmission en francais est obligatoire.',
            'transmission_en.required' => 'le champ transmission en anglais est obligatoire.'
        ]);

        $nom = [
            'fr' => $request->transmission_fr,
            'en' => $request->transmission_en
        ];

        $transmission->nom = [
            'fr' => $request->transmission_fr,
            'en' => $request->transmission_en
        ];

        $transmission->save();

        return redirect()->route('transmission.index')->with('success', 'Transmission modifié avec succée.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transmission $transmission)
    {
        $transmission->delete();
        return redirect()->route('transmission.index')->with('success', 'Transmission supprimé avec succée.');
    }
}
