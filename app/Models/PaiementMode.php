<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaiementMode extends Model
{
    use HasFactory;

    public function commande()
    {
        return $this->hasOne(Commande::class);
    }
}
