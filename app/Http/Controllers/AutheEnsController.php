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
use App\Models\Etudiant; // Importer le modèle

class AuthEtudController extends Controller
{
        /**
     * Affiche le tableau de bord avec les statistiques.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupérer le nombre d'étudiants et d'enseignants
        $etudiantsCount = Etudiant::count();  // Compte les enregistrements dans la table Etudiants
        $enseignantsCount = enseignant::count();  // Compte les enregistrements dans la table Enseignants

        // Passer ces données à la vue
        return view('dashboard1', compact('etudiantsCount', 'enseignantsCount'));
    }

    public function register()
    {
        return view('auth/register');
    }
    public function registerSave(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]); 
        return redirect()->route('login')->with('success', 'Étudiant ajouté avec succès.');
    }

    public function login()
    {
        return view('auth.login');
    }
    public function loginAction(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        // Tentative de login de l'utilisateur
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'))) {
            // Redirige vers la page d'accueil ou la page de tableau de bord
            return redirect()->intended(route('index')); // ou redirige vers une autre route spécifique
        }

        // Si l'authentification échoue
        return back()->withErrors([
            'email' => 'Les informations d\'identification ne correspondent pas à nos enregistrements.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();  // Déconnecte l'utilisateur
        return redirect()->route('login');  // Redirige vers la page de login
    }

    public function profile()
    {
        return view('profile');
    }

}
