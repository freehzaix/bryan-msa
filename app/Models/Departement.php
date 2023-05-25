<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departement extends Model
{
    use HasFactory;

    protected $fillable = [
        'departement_code',
        'departement_name',
        'colonne_id',
    ];

    public function colonne(){
        return $this->belongsTo(Colonne::class);
    }

    public function membre(){
        return $this->hasmany(Membre::class);
    }
    
}
