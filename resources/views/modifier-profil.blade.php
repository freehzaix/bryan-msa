<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MSA</title>

    <!-- Font Awesome -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <!-- MDB -->

    <!-- Main css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../Assets/css/memb.css">
    <script src="https://kit.fontawesome.com/f47a995387.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Navbar</span>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg  fixed-top " style="background-color: #0d8ae2;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MSA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link active text-white text-capitalize fw-semibold" aria-current="page"
                            href="{{ route('espace_membre') }}">Bienvenue</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white text-capitalize fst-italic" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-house-user"></i> {{ session('membre')->prenom }}
                            {{ session('membre')->nom }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./modifier-profil">Modifier profil</a></li>
                            <li><a class="dropdown-item" href="./logout">Deconnection</a></li>
                            <!--  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid">
        <div class="row mt-4 ">

            <div class="row">

                

                <div class="col"></div>
                <div class="col">
                    <h2 class="card-title">Modifier mon profil</h2>
                    @if(session('status'))
                        <div class="alert alert-success mt-2"> {{ session('status') }} </div>
                    @endif
                    <form class="mt-3" action="./modifier-profil" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Adresse mail</label>
                            <input type="email" class="form-control" name="email"
                                value="{{ session('membre')->email }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nom</label>
                            <input type="text" class="form-control" name="nom"
                                value="{{ session('membre')->nom }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Prénom</label>
                            <input type="text" class="form-control" name="prenom"
                                value="{{ session('membre')->prenom }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" name="telephone"
                                value="{{ session('membre')->telephone }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Quartier</label>
                            <input type="text" class="form-control" name="quartier"
                                value="{{ session('membre')->quartier }}">
                        </div>
                        <div class="mb-3">
                            <label class="label" for="colone">Colonne</label>
                            <select id="premiereSelection" name="colonne" class="form-select" required>
                                <option value="">Choisir une colonne</option>

                                @foreach ($colonnes as $colonne)
                                    <option value="{{ $colonne->id }}"> {{ $colonne->colonne_name }}</option>
                                @endforeach
                                   
                            </select>
                        </div>
                        <div class="mb-3">

                            <label class="label" for="département">Département</label>
                            <select name="departement" id="deuxiemeSelection" class="form-select" required>
                                <option value="">Choisir un département</option>
                                
                                  
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $('#premiereSelection').change(function() {
                                        var id = $(this).val();
                            
                                        // Effectuer une requête AJAX vers le serveur
                                        $.ajax({
                                            url: './modifier-profil/' + id,
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
                        
                        <button type="submit" class="btn btn-primary">Enregistrer les modification</button>
                        <br /> <br /> <br />
                    </form>
                </div>
                <div class="col"></div>


            </div>

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
