<?php

namespace App\Http\Controllers;

use Rules\Password;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules; 
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Etudiant; // Importer le modèle

class etudiants extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::all(); // Récupère tous les étudiants
        return view('Etudiant.index', compact('etudiants')); // Retourne la vue avec les étudiants
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Etudiant/create');
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed',Rules\Password::defaults()],
        ]);
        $etudiant = Etudiant::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]); 
        return redirect()->route('etudiants.create')->with('success', 'Étudiant ajouté avec succès.');
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
    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id); // Trouve l'étudiant ou échoue
        return view('Etudiant.edit', compact('etudiant')); // Retourne la vue d'édition
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $etudiant = Etudiant::findOrFail($id); // Trouve l'étudiant ou échoue
        $etudiant->update($request->all());

        // Si un mot de passe est fourni, on le chiffre et on le met à jour
        if ($request->filled('password')) {
            $etudiant->password = Hash::make($request->password);
        }

        // Rediriger avec un message de succès
        return redirect()->route('etudiants.index')->with('success', 'Étudiant mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->route('etudiants.index');
    }
}
