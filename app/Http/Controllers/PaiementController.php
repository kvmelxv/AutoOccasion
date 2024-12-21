<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\PaiementMode;
use App\Models\Voiture;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommandeController;


class PaiementController extends Controller
{
    //
    public function create($commande_id)
    {
        $mode_paiments = PaiementMode::all();
        return view('commande.payer', ['commande_id' => $commande_id, 'mode_paiments' => $mode_paiments]);
    }
    public function store(Request $request)
    {


        //return $request;
        $request->validate([
            'commande_id' => 'required',
            'paiementmode_id' => 'required',

        ]);


        // 'stripe';
        if ($request->paiementmode_id == 5) {
            $voitures = [];
            \Stripe\Stripe::setApiKey(config('stripe.sk'));

            $totalAmount = 0;
            $productItems = []; // line items

            foreach (session('panier') as $id => $voiture) {
                $product_name = $voiture['marque'] . ' ' . $voiture['modele'] . ' ' . $voiture['annee'];
                $total = $voiture['price'];

                // Calcule after  taxes
                $totalWithTaxes = $total * (1 + 0.05 + 0.09975); // TPS  + TVQ 
                $totalAmount += $totalWithTaxes;

                // 
                $productItems[] = [
                    'price_data' => [
                        'currency' => 'CAD',
                        'unit_amount' => (int) ($totalWithTaxes * 100), //  to cents
                        'product_data' => [
                            'name' => $product_name,
                        ],
                    ],
                    'quantity' => 1
                ];
            }

            $checkoutSession = \Stripe\Checkout\Session::create([
                'line_items' => $productItems,
                'mode' => 'payment',
                'allow_promotion_codes' => true,
                'metadata' => [
                    'user_id' => "0001"
                ],
                'customer_email' => Auth::user()->email,
                'success_url' => route('success', $request->commande_id),
                'cancel_url' => route('cancel'),
            ]);
            return redirect()->away($checkoutSession->url);
        }

        //comptant
        if ($request->paiementmode_id == 1) {


            $commande = Commande::find($request->commande_id);
            $commande->paiement_modes_id = 1;
            $commande->save();

            // voirure reserved
            $panier = session()->get('panier');
            foreach ($panier as $car) {

                $voiture = Voiture::find($car['id']);
                $voiture->commande_id = $request->commande_id;
                $voiture->save();
            }

            session()->forget('panier');

            return redirect()->route('home')->with('success', "Veuillez passer au bureau dans un delai de 48 heures pour régler votre facture". $commande->id.", Merci !");
        }
    }

    public function success($commande_id)
    {
        // voirure sold
        $panier = session()->get('panier');
        foreach ($panier as $car) {

            $voiture = Voiture::find($car['id']);
            $voiture->commande_id = $commande_id;
            $voiture->save();
        }

        //status to facturee
        $commande = Commande::find($commande_id);
        $commande->paiement_modes_id = 5;
        $commande->statut_id = 3;
        $commande->save();
        // vider
        session()->forget('panier');

        // envoie facture
        $ctrCmd = new CommandeController;
        $ctrCmd->pdf($commande);

        return redirect()->route('home')->with('success', 'Thanks for your order You have just completed your payment and an ivoice has been sent to' . $commande->user->email . '. The seeler will reach out to you as soon as possible!');

    }

    public function cancel()
    {
        $voitures = Voiture::all();

        return view('voiture.index', ['voitures' => $voitures]);

    }


}


