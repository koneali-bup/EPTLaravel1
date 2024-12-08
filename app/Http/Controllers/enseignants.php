<?php

namespace App\Http\Controllers;

use Rules\Password;
use App\Models\User;
use App\Models\enseignant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules; 
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
; // Importer le modèle

class enseignants extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $enseignants = enseignant::all(); 
        return view('Enseignant.index', compact('enseignants')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Enseignant/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed',Rules\Password::defaults()],
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('enseignants', 'public'); 
    }

    $enseignant = enseignant::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'image' => $imagePath,
    ]);

    return redirect()->route('enseignants.create');
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
        $enseignant = Enseignant::findOrFail($id); // Trouve l'étudiant ou échoue
        return view('Enseignant.edit', compact('enseignant')); // Retourne la vue d'édition
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $etudiant = Enseignant::findOrFail($id); 
        $etudiant->update($request->all());

        if ($request->filled('password')) {
            $etudiant->password = Hash::make($request->password);
        }

        return redirect()->route('enseignants.index')->with('success', 'enseignant mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enseignant $enseignant)
    {
        $enseignant->delete();
        return redirect()->route('enseignants.index');
    }
    

    public function generateBulletin()
    {
        $etudiant = Auth::user()->etudiant;  // Récupère l'étudiant authentifié
        $notes = $etudiant->notes()->with('matiere')->get();
        $moyennes = $notes->groupBy('matiere_id')->map(function ($matiereNotes) 
        {
            return $matiereNotes->avg('note');
        });
        $moyenne_generale = $notes->avg('note');

        // Générer le PDF
        $pdf = PDF::loadView('bulletin', compact('etudiant', 'moyennes', 'moyenne_generale'));

        // Retourner le PDF en téléchargement
        return $pdf->download('bulletin_' . $etudiant->nom . '.pdf');
    }
}
