<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [

        'nom_province',
        'pays_id'
    ];

    public function pays()
    {
        return $this->belongsTo(Pays::class, 'pays_id');
    }

    public function villes()
    {
        return $this->hasMany(Ville::class);
    }
}
