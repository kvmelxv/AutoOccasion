<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Taxe;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PanierController extends Controller
{
    public function ajoutPanier(Request $request, $voiture_id)
    {


        //return Session::flush();

        //return session()->get('panier');
        $voiture = Voiture::find($voiture_id);

        //return session()->get('panier');

        if (!$voiture) {
            abort(404);
        }

        // Add the voiture to  panier session
        $panier = session()->get('panier');
        if (isset($panier)) {
            foreach ($panier as $char) {
                if ($char['id'] == $voiture_id) {
                    return redirect()->back()->with('error', 'La voiture est déjà présente dans le panier. !');
                }
            }
        }

        $panier[$voiture_id] = [
            'id' => $voiture_id,
            'marque' => $voiture->modele->marque->nom,
            'modele' => $voiture->modele->nom,
            'annee' => $voiture->annee,
            'price' => $voiture->prixDeVente(),
        ];
        session()->put('panier', $panier);

        return redirect()->back()->with('success', 'voiture ajoué au  panier avec succès !');
    }

    public function showpanier()
    {
        //$panier = session()->get('panier');

        $taxes = Taxe::all();


        return view('panier.show', ['taxes' => $taxes]);

    }



    public function remove(Request $request, $voiture_id)
    {
        //return $voiture_id;
        if ($voiture_id) {
            $panier = session()->get('panier');
            if (isset($panier[$voiture_id])) {
                unset($panier[$voiture_id]);
                session()->put('panier', $panier);
            }
            //session()->flash('success', 'Product successfully removed!');
            return redirect()->back()->with('success', 'Product successfully removed!');
        }
    }
}
