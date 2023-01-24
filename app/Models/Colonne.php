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

}
