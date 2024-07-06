<!-- resources/views/contable/client_profile.blade.php -->

@extends('layouts.contable.master')

@section('content')
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Profil de {{ $client->nom_entreprise }}</h6>

            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Informations sur le Client</h5>
                    <p><strong>Nom de l'entreprise:</strong> {{ $client->nom_entreprise }}</p>
                    <p><strong>Adresse:</strong> {{ $client->adresse }}, {{ $client->ville }}, {{ $client->pays }}</p>
                    <p><strong>Contact:</strong> {{ $client->nom_contact }} ({{ $client->tel }})</p>
                    <!-- Afficher toutes les autres informations du client ici -->
                    <p><strong>Email:</strong> {{ $client->email }}</p>
                    <p><strong>Site Web:</strong> {{ $client->site_web }}</p>
                    <p><strong>Secteur:</strong> {{ $client->secteur }}</p>
                    <p><strong>Nom du directeur:</strong> {{ $client->nom_directeur }}</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Ajouter une Tâche</h5>
                    <form method="POST" action="{{ route('tasks.store', $client->id) }}">
                        @csrf

                        <div class="form-group">
                            <label for="titre">Titre</label>
                            <input type="text" class="form-control" id="titre" name="titre" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="Date_echeance">Date d'échéance</label>
                            <input type="date" class="form-control" id="Date_echeance" name="Date_echeance" required>
                        </div>

                        <div class="form-group">
                            <label for="statut">Statut</label>
                            <select class="form-control" id="statut" name="statut" required>
                                <option value="En cours">En cours</option>
                                <option value="Terminée">Terminée</option>
                                <option value="En attente">En attente</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Ajouter Tâche</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tâches</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Titre</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date d'échéance</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->titre }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->Date_echeance }}</td>
                                    <td>{{ $task->statut }}</td>
                                    <td>
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                                        <form action="{{ route('tasks.delete', $task->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Fichiers PDF</h5>
                    <ul>
                        <li>
                            <a href="{{ asset('storage/' . $client->copy_fiscale) }}" target="_blank">{{ $client->nom_entreprise }} - Copie Fiscale</a>
                        </li>
                        <li>
                            <a href="{{ asset('storage/' . $client->copy_bancaire) }}" target="_blank">{{ $client->nom_entreprise }} - Copie Bancaire</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
