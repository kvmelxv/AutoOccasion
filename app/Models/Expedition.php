<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expedition extends Model
{
    use HasFactory;

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    public function adresses()
    {
        return $this->belongsTo(Adresse::class, 'adresse_id');
    }


}
