@extends('layouts.Admin.master')

@section('content')
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Liste des Clients</h6>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nom de l'entreprise</th>
                        <th scope="col">Nom du contact</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->nom_entreprise }}</td>
                            <td>{{ $client->nom_contact }}</td>
                            <td>{{ $client->email }}</td>
                            <td>
                                <form action="{{ route('client.destroy', ['id' => $client->id]) }}" method="POST" style="display:inline-block;" class="d-flex justify-content-center">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">
                                        <i class="fas fa-trash-alt"></i> 
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
