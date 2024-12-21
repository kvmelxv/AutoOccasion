<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;

    protected $fillable = [

        'num_rue',
        'code_postal',
        'ville_id',
    ];

    public function villes()
    {
        return $this->belongsTo(Ville::class, 'ville_id');

    }

    public function users()
    {
        return $this->hasMany(User::class);

    }

    public function expeditions()
    {
        return $this->hasMany(Expedition::class);

    }



}
