<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules; 
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Rules\Password;
use App\Models\User;

class notes extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer l'étudiant authentifié
        $etudiant = Auth::user()->etudiant;  // Relation avec l'utilisateur (user_id)

        // Récupérer les notes de l'étudiant avec les matières associées
        $notes = $etudiant->notes()->with('matiere')->get();
        
        // Calculer la moyenne de chaque matière
        $moyennes = $notes->groupBy('matiere_id')->map(function ($matiereNotes) 
        {
            return $matiereNotes->avg('note');
        });
        
        // Calculer la moyenne générale
        $moyenne_generale = $notes->avg('note');
        
        return view('dashboard2', compact('moyennes', 'moyenne_generale'));
            
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
