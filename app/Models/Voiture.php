<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'date_arrivee',
        'prix_payee',
        'annee',
        'kilometrage',
        'modele_id',
        'motopropulseur_id',
        'carburant_id',
        'transmission_id',
        'couleur_id'

    ];

    protected $casts = [
        'description' => 'array',
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function modele()
    {
        return $this->belongsTo(Modele::class);
    }

    public function transmission()
    {
        return $this->belongsTo(Transmission::class);
    }

    public function carburant()
    {
        return $this->belongsTo(Carburant::class);
    }

    public function couleur()
    {
        return $this->belongsTo(Couleur::class);
    }

    public function motopropulseur()
    {
        return $this->belongsTo(Motopropulseur::class);
    }

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    public function prixDeVente($pourcentageDeVente = 0.25)
    {

        $resultatPourcentage = $this->prix_payee * $pourcentageDeVente;
        $prixDeVente = $this->prix_payee + $resultatPourcentage;

        return $prixDeVente;
    }



}
