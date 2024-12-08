<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Importer la classe User d'authentification
use Illuminate\Notifications\Notifiable;

class enseignant extends Authenticatable
{
    use HasFactory;

    protected $table = 'enseignant'; // Nom de la table
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
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
