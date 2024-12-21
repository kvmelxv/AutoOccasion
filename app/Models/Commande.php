<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'prix_total',
        'paiement_modes_id',
        'user_id',
        'statut_id',
        'expedition_id'

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function voitures()
    {
        return $this->hasMany(Voiture::class, 'commande_id');
    }

    public function modePaiement()
    {
        return $this->belongsTo(PaiementMode::class, 'paiement_modes_id');
    }
    public function expedition()
    {
        return $this->belongsTo(Expedition::class, 'expedition_id');
    }
    public function statut()
    {
        return $this->belongsTo(Statut::class, 'statut_id');
    }
}
