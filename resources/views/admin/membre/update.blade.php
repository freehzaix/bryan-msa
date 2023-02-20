@extends('admin.layouts.admin')

@section('content')
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>Modifier les informations d'un membre</h4>
        </div>
        <div class="form-body">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form action="/admin/membres/update/traitement" method="POST" enctype="multipart/form-data" class="signup-form">
                @csrf
                <input type="number" name="id" value="{{ $membres->id }}" style="display: none;">
                <div class="row">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" name="nom" placeholder="Nom" aria-label="nom" value="{{ $membres->nom }}">
                    </div>
                    <div class="form-group">
                        <label for="Prénom">Prénom</label>
                        <input type="text" class="form-control" name="prenom" placeholder="Prénom" aria-label="prénom" value="{{ $membres->prenom }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $membres->email }}">
                </div>
                <div class="form-group">
                    <label for="tel">Téléphone</label>
                    <input type="number" name="telephone" class="form-control" placeholder="Numéro de téléphone" value="{{ $membres->telephone }}">
                </div>
                <div class="form-group">
                    <label for="quartier">Quartier</label>
                    <input type="text" name="quartier" class="form-control" placeholder="Votre quartier" value="{{ $membres->quartier }}">
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="colone">Colonne</label>
                        <select id="inputcolone" name="colonne" class="form-control" required>
                            <option value="'{{ $membres->colonne }}'">Colonne: {{ $membres->colonne }}</option>
                            @foreach ($colonnes as $colonne)
                                <option value="{{ $colonne->colonne_name }}"> {{ $colonne->colonne_name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="département">Département</label>
                        <select id="inputdepartement" name="departement" class="form-control" required>
                            <option value="'{{ $membres->departement }}'">Département: {{ $membres->departement }}</option>
                            @foreach ($departements as $departement)
                                <option value="{{ $departement->departement_name }}">
                                    {{ $departement->departement_name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Nouveau mot de passe</label>
                    <input type="password" name="motdepasse" class="form-control" placeholder="Mot de passe" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Modifier les informations</button>
                </div>
            </form>
        </div>
    </div>
@endsection
