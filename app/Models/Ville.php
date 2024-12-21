<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    protected $fillable = [

        'nom_ville',
        'province_id'
    ];

    public function provinces()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function adresses()
    {
        return $this->hasMany(Adresse::class);
    }
}
