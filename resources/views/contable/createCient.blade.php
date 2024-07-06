@extends('layouts.contable.master')

@section('content')
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Ajouter un Client</h6>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <!-- Première partie du formulaire -->
                    <form method="POST" action="{{ route('clients.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Nom de l'entreprise -->
                        <div class="form-group">
                            <label for="nom_entreprise">Nom de l'entreprise</label>
                            <input type="text" class="form-control" id="nom_entreprise" name="nom_entreprise" required>
                        </div>

                        <!-- Adresse -->
                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" required>
                        </div>

                        <!-- Ville -->
                        <div class="form-group">
                            <label for="ville">Ville</label>
                            <input type="text" class="form-control" id="ville" name="ville" required>
                        </div>

                        <!-- Code Postal -->
                        <div class="form-group">
                            <label for="code_postal">Code Postal</label>
                            <input type="text" class="form-control" id="code_postal" name="code_postal" required>
                        </div>

                        <!-- Pays -->
                        <div class="form-group">
                            <label for="pays">Pays</label>
                            <input type="text" class="form-control" id="pays" name="pays" required>
                        </div>

                        <!-- Nom du contact -->
                        <div class="form-group">
                            <label for="nom_contact">Nom du contact</label>
                            <input type="text" class="form-control" id="nom_contact" name="nom_contact" required>
                        </div>

                        <!-- Fonction -->
                        <div class="form-group">
                            <label for="fonction">Fonction</label>
                            <input type="text" class="form-control" id="fonction" name="fonction" required>
                        </div>

                        <!-- Téléphone -->
                        <div class="form-group">
                            <label for="tel">Téléphone</label>
                            <input type="text" class="form-control" id="tel" name="tel" required>
                        </div>
                </div>

                <!-- Deuxième partie du formulaire -->

                <!-- Site Web -->
                <div class="form-group">
                    <label for="site_web">Site Web</label>
                    <input type="text" class="form-control" id="site_web" name="site_web">
                </div>

                <!-- Secteur -->
                <div class="form-group">
                    <label for="secteur">Secteur</label>
                    <input type="text" class="form-control" id="secteur" name="secteur" required>
                </div>

                <!-- Nom du directeur -->
                <div class="form-group">
                    <label for="nom_directeur">Nom du directeur</label>
                    <input type="text" class="form-control" id="nom_directeur" name="nom_directeur" required>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <!-- Copie fiscale -->
                <div class="form-group">
                    <label for="copy_fiscale">Copie Fiscale</label>
                    <input type="file" class="form-control form-control-sm" id="copy_fiscale" name="copy_fiscale"
                        required>
                </div>

                <!-- Copie bancaire -->
                <div class="form-group ">
                    <label for="copy_bancaire">Copie Bancaire</label>
                    <input type="file" class="form-control form-control-sm" id="copy_bancaire" name="copy_bancaire"
                        required>
                </div>

                <!-- ID du comptable -->
                <div class="form-group">
                    <input type="hidden" class="form-control " id="contable_id" name="contable_id" value="{{ Auth::user()->contable->id }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Ajouter Client</button>
                </form>
            </div>
        </div>
    </div>
@endsection
