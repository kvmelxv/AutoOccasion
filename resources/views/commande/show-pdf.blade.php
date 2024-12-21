<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .invoice {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        li strong {
            font-weight: bold;
        }
        .total {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>AUTOCASIONS</h1>
    </div>
    <div class="invoice">
        <h2>Commande #{{ $commande->id }}</h2>
        <p>Date: {{ $commande->date }}</p>
        <hr>
        <ul>
            <li><strong>Client :</strong> {{ $commande->user->prenom }} {{ $commande->user->name }}</li>
            <li><strong>Voiture :</strong>
                <ul>
                    @foreach($voitures as $voiture)
                        @if($voiture->commande_id == $commande->id)
                            <li>{{ $voiture->modele->marque->nom . ' ' . $voiture->modele->nom . ' ' . $voiture->annee }}   <strong> ${{$voiture->prixDeVente()}} </strong></li>
                            @php $prices[] = $voiture->prixDeVente(); @endphp
                        @endif
                    @endforeach
                </ul>
            </li>
                        
                        <li><strong>Adresse d'éxpedition:</strong> {{$commande->expedition->adresses->num_rue}}, {{$commande->expedition->adresses->code_postal}} {{$commande->expedition->adresses->villes->nom_ville}}, 
                        {{$commande->expedition->adresses->villes->provinces->nom_province}}, {{$commande->expedition->adresses->villes->provinces->pays->nom_pays}}</li>

                        <li>Type d'éxpedition : <strong>{{$commande->expedition->type}}</strong></li>
                        <li>Date d'éxpedition prévue : <strong>{{$commande->expedition->date}}</strong></li>
                        <li><strong>Mode de Paiement:</strong> {{ $commande->modePaiement->nom }}</li>

        </ul>
        <hr>
        <div class="total">
            <p>Montant total: <strong>{{ number_format($commande->prix_total) }} $</strong></p>
        </div>
    </div>
</body>
</html>
