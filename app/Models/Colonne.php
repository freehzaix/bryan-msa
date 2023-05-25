<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colonne extends Model
{
    use HasFactory;

    protected $fillable = [
        'colonne_code',
        'colonne_name',
    ];

    public function departement(){
        return $this->hasmany(Departement::class);
    }

    public function membre(){
        return $this->hasmany(Membre::class);
    }

}
