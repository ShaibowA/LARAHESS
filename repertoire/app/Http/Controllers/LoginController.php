<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin()
    {
        // Si déjà connecté, rediriger vers contacts
        if (session('logged_in')) {
            return redirect()->route('contacts.index');
        }
        
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'identifiant' => 'required',
            'mot_de_passe' => 'required'
        ], [
            'identifiant.required' => 'L\'identifiant est obligatoire.',
            'mot_de_passe.required' => 'Le mot de passe est obligatoire.'
        ]);

        // Vérifier les identifiants
        if ($request->identifiant === 'admin' && $request->mot_de_passe === 'abc') {
            // Connexion réussie
            session(['logged_in' => true]);
            return redirect()->route('contacts.index')->with('success', 'Connexion réussie !');
        }

        // Identifiants incorrects
        return back()->withErrors(['error' => 'Identifiant ou mot de passe incorrect.'])->withInput();
    }

    public function logout()
    {
        session()->forget('logged_in');
        return redirect()->route('login')->with('success', 'Déconnexion réussie.');
    }
}