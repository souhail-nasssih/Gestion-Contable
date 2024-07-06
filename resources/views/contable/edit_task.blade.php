<!-- resources/views/contable/edit_task.blade.php -->

@extends('layouts.contable.master')

@section('content')
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Modifier la Tâche</h6>

            <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" class="form-control" id="titre" name="titre" value="{{ $task->titre }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $task->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="Date_echeance">Date d'échéance</label>
                    <input type="date" class="form-control" id="Date_echeance" name="Date_echeance" value="{{ $task->Date_echeance }}" required>
                </div>

                <div class="form-group">
                    <label for="statut">Statut</label>
                    <select class="form-control" id="statut" name="statut" required>
                        <option value="En cours" {{ $task->statut == 'En cours' ? 'selected' : '' }}>En cours</option>
                        <option value="Terminée" {{ $task->statut == 'Terminée' ? 'selected' : '' }}>Terminée</option>
                        <option value="En attente" {{ $task->statut == 'En attente' ? 'selected' : '' }}>En attente</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>
        </div>
    </div>
@endsection
