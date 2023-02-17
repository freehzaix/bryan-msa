@extends('admin.layouts.admin')

@section('content')
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>Ajouter un membre</h4>
        </div>
        <div class="form-body">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form action="/admin/membre/add/traitement" method="POST" enctype="multipart/form-data" class="signup-form">
                @csrf
                <div class="row">
                    <div class="form-group">
                        <label class="label" for="nom">Nom</label>
                        <input type="text" class="form-control" name="nom" placeholder="Nom" aria-label="nom"
                            required>
                    </div>
                    <div class="form-group">
                        <label class="label" for="Prénom">Prénom</label>
                        <input type="text" class="form-control" name="prenom" placeholder="Prénom" aria-label="prénom"
                            required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="label" for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label class="label" for="tel">Téléphone</label>
                    <input type="number" name="telephone" class="form-control" placeholder="Numéro de téléphone" required>
                </div>
                <div class="form-group">
                    <label class="label" for="quartier">Quartier</label>
                    <input type="text" name="quartier" class="form-control" placeholder="Votre quartier" required>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="label" for="colone">Choisir sa Colonne</label>
                        <select id="inputcolone" name="colonne" class="form-control" required>
                            <option value="">Choisir une colonne</option>
                            @foreach ($colonnes as $colonne)
                                <option value="{{ $colonne->colonne_name }}"> {{ $colonne->colonne_name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label" for="département">Choisir Son departement</label>
                        <select id="inputdepartement" name="departement" class="form-control" required>
                            <option value="">Choisir un département</option>
                            @foreach ($departements as $departement)
                                <option value="{{ $departement->departement_name }}">
                                    {{ $departement->departement_name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" for="inputGroupImg">Téléchargez une image de profil</label>
                    <input type="file" name="image" class="form-control" id="inputGroupImg">
                </div>

                <div class="form-group">
                    <label class="label" for="password">Entrez le mot de passe</label>
                    <input type="password" name="motdepasse" class="form-control" placeholder="Mot de passe" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
@endsection
