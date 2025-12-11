<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request, Contact $contact)
    {
    $request->validate([
            'nom' => 'required',
            'telephone' => 'required|regex:/^[0-9]+$/|unique:contacts,telephone,' . $contact->id,
            'email' => 'nullable|email'
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'telephone.required' => 'Le numéro de téléphone est obligatoire.',
            'telephone.unique' => 'Ce numéro existe déjà dans la liste.',
            'telephone.regex' => 'Le numéro doit contenir uniquement des chiffres.',
            'email.email' => 'L\'adresse email n\'est pas valide.',
        ]);
        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('success', 'Contact ajouté');
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'nom' => 'required',
            'telephone' => 'required|regex:/^[0-9]+$/|unique:contacts,telephone,' . $contact->id,
            'email' => 'nullable|email'
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'telephone.required' => 'Le numéro de téléphone est obligatoire.',
            'telephone.unique' => 'Ce numéro existe déjà dans la liste.',
            'telephone.regex' => 'Le numéro doit contenir uniquement des chiffres.',
            'email.email' => 'L\'adresse email n\'est pas valide.',
        ]);
        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('success', 'Contact mis à jour');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact supprimé');
    }}
