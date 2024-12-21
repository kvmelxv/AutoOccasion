<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carburant extends Model
{
    use HasFactory;


    protected $fillable = [
        'nom'
    ];

    protected $casts = [
        'nom' => 'array',
    ];

    public function voiture(){
        return $this->hasMany(Voiture::class);
    }
}
