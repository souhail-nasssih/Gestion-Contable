@extends('layouts.contable.master')

@section('content')
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Liste des Clients</h6>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom de l'entreprise</th>
                            {{-- <th scope="col">Adresse</th> --}}
                            <th scope="col">Ville</th>
                            {{-- <th scope="col">Pays</th> --}}
                            {{-- <th scope="col">Nom du contact</th> --}}
                            <th scope="col">Téléphone</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <th scope="row">{{ $client->id }}</th>
                                <td>{{ $client->nom_entreprise }}</td>
                                {{-- <td>{{ $client->adresse }}</td> --}}
                                <td>{{ $client->ville }}</td>
                                {{-- <td>{{ $client->pays }}</td> --}}
                                {{-- <td>{{ $client->nom_contact }}</td> --}}
                                <td>{{ $client->tel }}</td>
                                <td>
                                    <!-- Liens pour modifier et supprimer un client -->
                                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                                    <a href="{{ route('clients.profile', $client->id) }}" class="btn btn-sm btn-primary">Consulter</a>

                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
