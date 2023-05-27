<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'motdepasse',
        'telephone',
        'quartier',
        'colonne',
        'departement',
        'image',
        'situation_matrimoniale',
    ];

    public function colonne(){
        return $this->belongsTo(Colonne::class);
    }

    public function departement(){
        return $this->belongsTo(Colonne::class);
    }

}
