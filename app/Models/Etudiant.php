<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etudiant extends Model
{
    use HasFactory;

    protected $table = 'etudiant'; // Nom de la table
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Lors de la création d'un étudiant, on chiffre le mot de passe
    public static function boot()
    {
        parent::boot();

        static::creating(function ($etudiant) 
        {
            $etudiant->password = Hash::make($etudiant->password);
        });
    }    
}