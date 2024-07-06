<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Tache::all(); // Assuming Tache is your model for tasks
        return view('contable.calendar_global', compact('tasks'));
    }
    public function getTasksForCalendar()
    {
        // Récupérer toutes les tâches avec la date d'échéance et l'ID du client
        $tasks = Tache::select('id', 'titre as title', 'Date_echeance as start', 'client_id')->get();
    
        return response()->json($tasks);
    }
    
    

    
    public function showClientProfile($clientId)
    {
        $client = Client::findOrFail($clientId);
        $tasks = Tache::where('client_id', $clientId)->get();
        return view('contable.showClient', compact('client', 'tasks'));
    }

    // Afficher le formulaire pour ajouter une tâche
    public function createTaskForm($clientId)
    {
        $client = Client::findOrFail($clientId);
        return view('contable.showClient', compact('client'));
    }


    // Enregistrer une nouvelle tâche
    public function storeTask(Request $request, $clientId)
    {
        $request->validate([
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'Date_echeance' => ['required', 'date'],
            'statut' => ['required', 'string'],
        ]);

        Tache::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'Date_echeance' => $request->Date_echeance,
            'statut' => $request->statut,
            'client_id' => $clientId,
        ]);

        return redirect()->route('clients.profile', $clientId)->with('success', 'Tâche ajoutée avec succès.');
    }

    public function editTaskForm($taskId)
    {
        $task = Tache::findOrFail($taskId);
        return view('contable.edit_task', compact('task'));
    }

    public function updateTask(Request $request, $taskId)
    {
        $request->validate([
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'Date_echeance' => ['required', 'date'],
            'statut' => ['required', 'string'],
        ]);

        $task = Tache::findOrFail($taskId);
        $task->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'Date_echeance' => $request->Date_echeance,
            'statut' => $request->statut,
        ]);

        return redirect()->back()->with('success', 'Tâche mise à jour avec succès.');
    }

    // Supprimer une tâche
    public function deleteTask($taskId)
    {
        $task = Tache::findOrFail($taskId);
        $task->delete();

        return redirect()->back()->with('success', 'Tâche supprimée avec succès.');
    }
    // Exemple de méthode dans le contrôleur TaskController.php

public function showGlobalCalendar()
{
    $tasks = Tache::with('client')->get(); // Assurez-vous que vous avez la relation définie dans le modèle Task
    return view('contable.calendar_global', compact('tasks'));
}


public function getEvents()
    {
        $tasks = Tache::all(); // Récupérez les tâches depuis la base de données

        $events = [];
        foreach ($tasks as $task) {
            $events[] = [
                'title' => $task->title,
                'start' => $task->due_date,
                // Ajoutez d'autres informations d'événement si nécessaire
            ];
        }

        return response()->json($events);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
