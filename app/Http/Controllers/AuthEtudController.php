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
        $etudiantsCount = Etudiant::count(); 
        $enseignantsCount = enseignant::count();  

        return view('dashboard', compact('etudiantsCount', 'enseignantsCount'));
    }
    public function index1()
    {
        return view('dashboard1');
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
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6'],
        ]);
    
        $role = $request->input('role');
        $xx = null;
    
        if ($role == 'admin') {
            $xx = User::where('email', $request->email)->first();
        } elseif ($role == 'enseignant') {
            $xx = enseignant::where('email', $request->email)->first();
        }
        if ($xx && Hash::check($request->password, $xx->password)) {
            Auth::login($xx);
            if ($role == 'admin') {
                return redirect()->route('index');
            } elseif ($role == 'enseignant') {
                return redirect()->route('index1'); 
            }
        }
        return back()->withErrors([
            'email' => 'Les informations d\'identification ne correspondent pas à nos enregistrements.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout(); 
        return redirect()->route('login'); 
    }

    public function profile()
    {
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                Storage::delete('public/profiles/' . $user->profile_image);
            }

            $path = $request->file('profile_image')->store('public/profiles');
            $user->profile_image = basename($path);
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profil mis à jour avec succès.');
    }
    public function updatePassword(Request $request)
{
    // Validation des données
    $request->validate([
        'current_password' => 'required|string|min:6',
        'new_password' => 'required|string|min:6|confirmed',
    ]);

    $user = Auth::user();

    // Vérification du mot de passe actuel
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
    }

    // Mise à jour du mot de passe
    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->route('profile')->with('success', 'Mot de passe modifié avec succès.');
}

}
