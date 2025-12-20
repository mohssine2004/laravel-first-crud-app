<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // On utilise Eloquent pour récupérer tous les enregistrements de la table 'contacts'
        $contacts = Contact::all();

        // On retourne la vue 'contacts.index' en lui passant les données
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email'
        ]);

        Contact::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'job_title'  => $request->job_title,
            'city'       => $request->city,
            'country'    => $request->country,
        ]);

        return redirect('/contacts')->with('success', 'Contact ajouté avec succès');
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
        // On cherche le contact par son ID
        $contact = Contact::find($id);

        // On retourne la vue 'edit' en passant les données du contact
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // On valide les données du formulaire
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email'
        ]);

        // On récupère le contact à modifier
        $contact = Contact::find($id);

        // On met à jour les données du contact
        $contact->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'job_title'  => $request->job_title,
            'city'       => $request->city,
            'country'    => $request->country,
        ]);

        return redirect('/contacts')->with('success', 'Contact mis à jour avec succès');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // 1. Trouver le contact
        $contact = Contact::find($id);

        // 2. Supprimer le contact
        $contact->delete();

        // 3. Rediriger vers la liste avec un message de confirmation
        return redirect('/contacts')->with('success', 'Contact supprimé avec succès !');
    }
}
