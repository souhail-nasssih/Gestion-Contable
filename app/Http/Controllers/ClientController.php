<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clients = Client::all();
        return view('contable.indexClient', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('contable.createCient');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Valider les données du formulaire
        $request->validate([
            'nom_entreprise' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'ville' => ['required', 'string', 'max:255'],
            'code_postal' => ['required', 'string', 'max:255'],
            'pays' => ['required', 'string', 'max:255'],
            'nom_contact' => ['required', 'string', 'max:255'],
            'fonction' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string', 'max:255'],
            'site_web' => ['nullable', 'string', 'max:255'],
            'secteur' => ['required', 'string', 'max:255'],
            'nom_directeur' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients,email'],
            'copy_fiscale' => ['required', 'file', 'mimes:pdf'],
            'copy_bancaire' => ['required', 'file', 'mimes:pdf'],
            'contable_id' => ['required', 'string', 'max:255'],
        ]);
        
        // Récupérer les fichiers
        $copyFiscalePath = $request->file('copy_fiscale')->store('clients/copies_fiscales', 'public');
        $copyBancairePath = $request->file('copy_bancaire')->store('clients/copies_bancaires', 'public');

        // Créer un nouveau client
        $client = Client::create([
            'nom_entreprise' => $request->nom_entreprise,
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'code_postal' => $request->code_postal,
            'pays' => $request->pays,
            'nom_contact' => $request->nom_contact,
            'fonction' => $request->fonction,
            'tel' => $request->tel,
            'site_web' => $request->site_web,
            'secteur' => $request->secteur,
            'nom_directeur' => $request->nom_directeur,
            'email' => $request->email,
            'copy_fiscale' => $copyFiscalePath,
            'copy_bancaire' => $copyBancairePath,
            'contable_id' => $request->contable_id,
        ]);

        // Redirection avec message de succès
        return redirect()->route('client.index')->with('success', 'Client ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $client = Client::findOrFail($id);
        return view('contable.showClient', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('contable.editeCLient');
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
