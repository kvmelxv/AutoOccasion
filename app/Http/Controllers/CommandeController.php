<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Expedition;
use App\Models\Statut;
use App\Models\Voiture;
use App\Models\Ville;
use App\Models\Province;
use App\Models\Pays;
use App\Models\PaiementMode;
use App\Models\Adresse;
use Dompdf\Dompdf;

use App\Mail\InvoiceEmail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //crm
    public function index()
    {
        $statuts = Statut::all();
        $commandes = Commande::all();
        $voitures = Voiture::all();
        return view('commande.index', ['commandes' => $commandes, 'voitures' => $voitures, 'statuts' => $statuts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Voiture $voiture, $total)
    {
        //
        //return $voiture->prixDeVente();



        $villes = Ville::all();
        $provinces = Province::all();
        $pays = Pays::all();




        return view('commande.create', ['total' => $total, 'villes' => $villes, 'provinces' => $provinces, 'pays' => $pays, 'voiture' => $voiture]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //return $request;

        $request->validate(
            [
                'prix_total' => 'required|numeric|max:9999999999.9999',
                'num_rue' => 'required|max:150',
                'province_id' => 'required|exists:provinces,id',
                'ville_id' => 'required|exists:villes,id',
                'pays_id' => 'required|exists:pays,id',
                'code_postal' => 'required|regex:/^[A-Za-z]\d[A-Za-z][- ]?\d[A-Za-z]\d$/',
                //'paiementmode_id' => 'required|exists:paiement_modes,id',
                'date' => 'required|date|date_format:Y-m-d',
                'type' => 'required',

            ],
            [
                'name.required' => 'Please enter your name.',
                'province_id.required' => 'Please select a provence.',
                'ville_id.required' => 'Please select a City.',
                'pays_id.required' => 'Please select a Country.',
                'code_postal.required' => 'Please enter a valid postal code.',
                'code_postal.regex' => 'Please enter a valid postal code.',
                'date.required' => 'Please enter a shipping date.',
                'type.required' => 'Please enter a shipping type.',
                //'paiementmode_id.required' => 'Please select a payment method.',


            ]
        );

        $adresse = new Adresse;
        $adresse->num_rue = $request->num_rue;
        $adresse->code_postal = $request->code_postal;
        $adresse->ville_id = $request->ville_id;

        $adresse->save();
        $adresseID = $adresse->id;

        $expidition = new Expedition;
        $expidition->type = $request->type;
        $expidition->adresse_id = $adresseID;
        $expidition->date = $request->date;

        $expidition->save();
        $expiditionID = $expidition->id;

        //status
        /* $statut_id = 2;
        if ($request->paiement_modes_id == 1 || $request->paiement_modes_id == 4)
            $statut_id = 1; */

        $currentDate = Carbon::now()->format('Y-m-d');

        $commande = new Commande;
        $commande->date = $currentDate;
        $commande->prix_total = $request->prix_total;
        //$commande->paiement_modes_id = $request->paiementmode_id;
        $commande->user_id = Auth::user()->id;
        $commande->statut_id = 1; // en attente
        $commande->expedition_id = $expiditionID;

        $commande->save();
        $commandeID = $commande->id;

        //return $commande;



        return redirect()->route('commande.payer', $commande->id)->with('success', 'La Commandea été Crée avec succès !');


        //return 'good';
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $this->authorize('edit-commande');

        $commande = Commande::find($id);

        $adresses = Adresse::all();
        $voitures = Voiture::all();
        $statuts = Statut::all();

        return view('commande.show', ["commande" => $commande, "voitures" => $voitures, "statuts" => $statuts]);
    }

    //filtre
    public function filter(Request $request)
    {
        $query = Commande::query();

        //  by command ID
        if ($request->filled('commande_id')) {
            $query->where('id', $request->commande_id);
        }

        //  by client name
        if ($request->filled('client_name')) {
            $query->whereHas('user', function ($userQuery) use ($request) {
                $userQuery->where('prenom', 'LIKE', '%' . $request->client_name . '%')
                    ->orWhere('name', 'LIKE', '%' . $request->client_name . '%');
            });
        }

        //  by status
        if ($request->filled('statut')) {
            $query->where('statut_id', $request->statut);
        }

        $commandes = $query->get();
        $statuts = Statut::all();

        return view('commande.index', compact('commandes', 'statuts'));
    }

    public function updateStatut(Request $request, $id)
    {
        $this->authorize('edit-commande');

        $request->validate([
            'statut_id' => 'required|exists:statuts,id',
        ], [
            'statut_id.required' => 'Veuillez Selectionner un statut !'
        ]);
        $commande = Commande::find($id);
        $commande->statut_id = $request->statut_id;
        $commande->save();

        // send facture
        /*     if ($commande->statut_id == 3) {
                $this->pdf($commande);
                return redirect()->route('commande-crm.show', $commande->id)->with('success', 'Statut changee avec succes !');

            } */
        return redirect()->back()->with('success', 'Statut changee avec succes !');



    }

    public function pdf(Commande $commande)
    {


        $voitures = Voiture::all();
        $pdf = new Dompdf();
        $pdf->setPaper('letter', 'portrait');
        $pdf->loadHtml(view('commande.show-pdf', ['commande' => $commande, 'voitures' => $voitures]));
        $pdf->render();

        $pdf->stream('facure-' . $commande->id . '.pdf');

        // Save PDF to a temp location
        $pdfPath = storage_path('app/public/facure-' . $commande->id . '.pdf');
        file_put_contents($pdfPath, $pdf->output());

        // Send  PDF as an email attachment
        Mail::to($commande->user->email)->send(new InvoiceEmail($pdfPath));

        // delete temp PDF file
        unlink($pdfPath);


        // return redirect()->route('home')->with('success', 'Thanks for your order You have just completed your payment and an ivoice has been sent to' . $commande->user->email . ' The seeler will reach out to you as soon as possible!');




    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        //
    }


}
