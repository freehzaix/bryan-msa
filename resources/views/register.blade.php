@extends('layouts.form')

@section('title')
    Inscription
@endsection


@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">

                        <div class="row p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100 text">
                                    <h3 class="mb-4">Inscription</h3>
                                </div>

                            </div>

                            <!-- Form -->

                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="alert alert-danger">
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            <form action="/register/traitement" method="POST" enctype="multipart/form-data"
                                class="signup-form">
                                @csrf
                                <div class="row">
                                    <div class="col mb-3 form-group">
                                        <label class="label" for="nom">Nom</label>
                                        <input type="text" class="form-control" name="nom" placeholder="Nom" aria-label="nom" required value="{{ old('nom') }}">
                                    </div>
                                    <div class="col mb-3 form-group">
                                        <label class="label" for="Prénom">Prénom</label>
                                        <input type="text" class="form-control" name="prenom" placeholder="Prénom" aria-label="prénom" required value="{{ old('prenom') }}">
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label" for="email">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="tel">Téléphone</label>
                                    <input type="number" name="telephone" class="form-control" placeholder="+225 07070707" value="{{ old('telephone') }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="quartier">Quartier</label>
                                    <input type="text" name="quartier" class="form-control" placeholder="Votre quartier" required value="{{ old('quartier') }}">
                                </div>

                                <div class="row">
                                    <div class="col mb-3 form-group">
                                        <label class="label" for="colone">Choisir sa Colonne</label>
                                        <select id="premiereSelection" name="colonne" class="form-select" required>
                                            <option value="">Choisir une colonne</option>

                                            @foreach ($colonnes as $colonne)
                                                <option value="{{ $colonne->id }}"> {{ $colonne->colonne_name }}</option>
                                            @endforeach
                                               
                                        </select>
                                    </div>
                                    <div class="col mb-3 form-group">

                                        <label class="label" for="département">Choisir Son departement</label>
                                        <select name="departement" id="deuxiemeSelection" class="form-select" required>
                                            <option value="">Choisir un département</option>
                                            
                                              
                                        </select>
                                        <script>
                                            $(document).ready(function() {
                                                $('#premiereSelection').change(function() {
                                                    var id = $(this).val();
                                        
                                                    // Effectuer une requête AJAX vers le serveur
                                                    $.ajax({
                                                        url: '/register/' + id,
                                                        type: 'GET',
                                                        dataType: 'json',
                                                        success: function(data) {
                                                            var deuxiemeSelection = $('#deuxiemeSelection');
                                                            deuxiemeSelection.empty(); // Vider les options précédentes
                                        
                                                            // Parcourir les données et ajouter les options à la deuxième sélection
                                                            $.each(data, function(key, value) {
                                                                deuxiemeSelection.append('<option value="' + value.id + '">' + value.departement_name + '</option>');
                                                            });
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="inputGroupImg">Téléchargez une image de profil</label>
                                    <input type="file" name="image" class="form-control" id="inputGroupImg">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label" for="password">Entrez le mot de passe</label>
                                    <input type="password" name="motdepasse" class="form-control" placeholder="Mot de passe"
                                        required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3 ">S'inscrire</button>
                                </div>
                            </form>
                            <!-- fin de la Form -->
                            <p class="text-center">Déja membre? <a href="/login"> Se connecter </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
