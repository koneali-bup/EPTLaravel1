<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class etudiants extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $etudiant = Etudiant::where('email', $request->email)->first();

        if ($etudiant && password_verify($request->password, $etudiant->password)) {
            Auth::login($etudiant);
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Les informations d\'identification sont incorrectes.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
