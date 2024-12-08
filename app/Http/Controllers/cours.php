<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cour;
use Illuminate\Validation\Rules; 
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Rules\Password;
use App\Models\User;

class cours extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cours = Cour::all();
        return view('Cour.index', compact('cours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Cour.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'document' => 'nullable|file|mimes:pdf|max:10240',  
        ]);

        if ($request->hasFile('document')) {
            $pdfPath = $request->file('document')->store('documents/cours', 'public');
        } else {
            $pdfPath = null;
        }

        Cour::create([
            'nom' => $request->nom,
            'document' => $pdfPath,
        ]);

        return redirect()->route('Cour.index')->with('success', 'Cours ajouté avec succès.');
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
