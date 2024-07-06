<?php

namespace App\Http\Controllers;

use App\Models\Contable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contables = Contable::all();
        return view('admin.listeContable', compact('contables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.ajouterContable');
    }
    public function createContable($id)
    {
        return view('admin.ajouterContable', ['userId' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Contable::create($request->all());

        return redirect()->route('contable.index');
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


    /**
     * Update the specified resource in storage.
     */
    public function edit($id)
    {
        $contable = Contable::with('user')->findOrFail($id);
        return view('admin.modifierContable', compact('contable'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'salaire' => ['required', 'string', 'max:255'],
        ]);
    
        // Find the contable and the associated user
        $contable = Contable::findOrFail($id);
        $user = $contable->user;
    
        // Update the user data
        $user->update([
            'name' => $request->name,
            'role' => $request->role,
            // 'email' => $request->email,
        ]);
    
        // Update the contable data
        $contable->update([
            'salaire' => $request->salaire,
        ]);
    
        return redirect()->route('contable.index')->with('success', 'Comptable mis à jour avec succès');
    }
    



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $contable = User::findOrFail($id);
        $contable->delete();
        return redirect()->route('contable.index')->with('success', 'Comptable supprimé avec succès');
    }
}
