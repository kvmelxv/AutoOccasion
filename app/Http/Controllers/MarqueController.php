<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class MarqueController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $marques = Marque::orderBy('nom')->get();
        return view('marque.index', ['marques' => $marques]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required'
        ],
        [
            'nom.required' => 'le champ marque est obligatoire.'
        ]);

        $marque = Marque::create([
            'nom' => $request->nom,
        ]);

        return redirect()->route('marque.index')->with('success', 'marque inserer avec succée.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marque $marque)
    {
        return view('marque.edit', ['marque' => $marque]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marque $marque)
    {
        $request->validate([
            'nom' => 'required'
        ]);

        $marque->nom = $request->nom;

        $marque->save();
        return redirect()->route('marque.index')->with('success', 'marque modifiée avec succée.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marque $marque)
    {
        $marque->delete();
        return redirect()->route('marque.index')->with('success', 'marque supprimée avec succée.');
    }
}
