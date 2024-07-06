@extends('layouts.Admin.master')

@section('content')

<div class="col-sm-12 col-xl-6">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Modifier Comptable</h6>

        <!-- Affichage des messages d'erreur de validation -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contable.update', ['id' => $contable->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $contable->user->name }}" placeholder="Entrer le nom">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Rôle</label>
                <input type="text" class="form-control" id="role" name="role" value="{{ $contable->user->role }}" placeholder="Entrer le rôle">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $contable->user->email }}" placeholder="Entrer l'email">
            </div>
            <div class="mb-3">
                <label for="salaire" class="form-label">Salaire</label>
                <input type="text" class="form-control" id="salaire" name="salaire" value="{{ $contable->salaire }}" placeholder="Entrer le salaire">
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</div>

@endsection
