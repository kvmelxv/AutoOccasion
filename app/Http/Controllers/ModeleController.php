<?php
namespace App\Http\Controllers;

use App\Models\Modele;
use App\Models\Marque;
use Illuminate\Http\Request;

class ModeleController extends Controller
{

    /* Recupere les modeles selon l'id de la marque */
    public function getModelesParId($marque_id){
        $modeles = Modele::where('marque_id', $marque_id)->get();
        return response()->json($modeles);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modeles = Modele::all();
        $marques = Marque::all();

        return view('modele.index', ['modeles' => $modeles, 'marques' => $marques]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* return $request; */
        $request->validate([
            'nom' => 'required',
            'marque_id' => 'required|exists:marques,id'
        ],
        [
            'nom.required' => 'le champ nom du modele est obligatoire.',
            'marque_id.required' => 'le champ marque est obligatoire.',
            'marque_id.exist' => 'La marque selectionnée est invalide.'
        ]);

        $modele = Modele::create([
            'nom' => $request->nom,
            'marque_id' => $request->marque_id
        ]);

        return redirect()->route('modele.index')->with('success', 'modele inseré avec succée.');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modele $modele)
    {
        $marques = Marque::all();
        return view('modele.edit', ['modele' => $modele, 'marques' => $marques]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modele $modele)
    {
        $request->validate([
            'nom' => 'required',
            'marque_id' => 'required|exists:marques,id'
        ],
        [
            'nom.required' => 'le champ nom du modele est obligatoire.',
            'marque_id.required' => 'le champ marque est obligatoire.',
            'marque_id.exist' => 'La marque selectionnée est invalide.'
        ]);

        $modele->nom = $request->nom;
        $modele->marque_id = $request->marque_id;

        $modele->save();

        return redirect()->route('modele.index')->with('success', 'modele modifié avec succée.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modele $modele)
    {
        $modele->delete();
        return redirect()->route('modele.index')->with('success', 'modele supprimé avec succée.');
    }
}
