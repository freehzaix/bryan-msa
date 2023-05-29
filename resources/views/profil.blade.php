<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="./frontend/Assets/js/color-modes.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <!-- MDB -->

    <!-- Main css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../Assets/css/memb.css">
    <script src="https://kit.fontawesome.com/f47a995387.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.111.3">
    <title>Blog Template · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">
    <link href="./frontend/Assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .img-head {
            height: 100%;
            position: fixed;
            right: 0px;
            width: 100%;
            background-image: url(./frontend/Assets/images/img_bg_profil.jpg);
            background-size: cover;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template
    <link href="blog.css" rel="stylesheet">-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Navbar</span>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg  fixed-top " style="background-color: #1b1b1b;">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{ route('espace_membre') }}">MSA</a>
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
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Deconnection</a></li>
                            <!--  <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="p-4 p-md-5 mb-4  img-head ">

    </div>

    <div class="container mt-5  ">
        <div class="row mb-2">

            <div class="col-md-4 rounded shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                <div class="card " style="width: 100%;">
                    <img src="./storage/{{ session('membre')->image }}" class="card-img-top" alt="..."
                        style="max-height: 550px;">
                </div>
            </div>

            <div class="col-md-6 pt-lg-2 ms-lg-5">

                <div class="card" style="opacity: 0.7;">
                    <h5 class="card-header fw-bold">{{ session('membre')->prenom }} {{ session('membre')->nom }}</h5>
                    <div class="card-body">
                        <div class="card-body font-roboto">
                            <p class="card-text text-capitalize fw-semibold"> 
                                <i class="fa-solid fa-building-user"></i>
                                Colone : {{ $col->colonne_name }} | 
                                <i class="fa-solid fa-building-user"></i>
                                Departement : {{ $dep->departement_name }} 
                            </p>
                            <p class="card-text text-capitalize fw-semibold">
                                <i class="fa-solid fa-building-user"></i>
                                {{ session('membre')->situation_matrimoniale }},
                                <small class="text-muted">
                                    <i class="fa-solid fa-map-location-dot"></i> {{ session('membre')->quartier }}
                                </small>
                                <i class="fa-solid fa-mobile-screen-button"></i> {{ session('membre')->telephone }}
                            </p>
                        </div>
                    </div>
                </div>



                <!-- formulaire start-->
                <div class="row">
                    <div class="pt-lg-2">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false"
                                        aria-controls="collapseOne">
                                        Modifier mes informations
                                    </button>
                                </h2>

                                <div id="collapseOne" class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body p-0  ">

                                        <!-- formulaire start-->

                                        <div style="position: relative; z-index: 99; background-color: rgb(255, 255, 255);">
                                            <div class="col p-4">
                                                <h2 class="card-title">Modifier mon profil</h2>

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
                                                        <label class="label" for="colone">Situation matrimoniale</label>
                                                        <select name="situation_matrimoniale" class="form-select" required>
                                                            <option value="{{ session('membre')->situation_matrimoniale }}"> {{ session('membre')->situation_matrimoniale }} </option>
                                                            <option value="">Choisir votre situation matrimoniale</option>
                                                            <option value="Célibataire">Célibataire</option>
                                                            <option value="Célibataire ceinture noire">Célibataire ceinture noire</option>
                                                            <option value="Marié(e)">Marié(e)</option>
                                                            <option value="Veuf(ve)">Veuf(ve)</option>

                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="label" for="colone">Colonne</label>
                                                        <select id="premiereSelection" name="colonne"
                                                            class="form-select" required>
                                                            <option value="">Choisir une colonne</option>

                                                            @foreach ($colonnes as $colonne)
                                                                <option value="{{ $colonne->id }}">
                                                                    {{ $colonne->colonne_name }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                    <div class="mb-3">

                                                        <label class="label" for="département">Département</label>
                                                        <select name="departement" id="deuxiemeSelection"
                                                            class="form-select" required>
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
                                                                                deuxiemeSelection.append('<option value="' + value.id +
                                                                                    '">' + value.departement_name + '</option>');
                                                                            });
                                                                        }
                                                                    });
                                                                });
                                                            });
                                                        </script>
                                                    </div>

                                                    <button type="submit"
                                                        class="form-control btn btn-primary rounded submit px-3">Enregistrer
                                                        les modification</button>
                                                    <br /> <br /> <br />
                                                </form>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="pt-lg-2">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        Modifier mon image de profil
                                    </button>
                                </h2>

                                <div id="collapseTwo" class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body p-0  ">

                                        <!-- formulaire start-->

                                        <div class=" "
                                            style="position: relative; z-index: 99; background-color: rgb(255, 255, 255);">
                                            <div class="col p-4">
                                                <h2 class="card-title">Modifier mon image de profil</h2>
                                                
                                                <form action="{{ route('modifier_image_profil') }}" method="POST" enctype="multipart/form-data" class="signup-form">
                                                    @csrf
                                                    <div class="form-group mb-3">
                                                        <label class="label" for="inputGroupImg">Téléchargez une image de profil</label>
                                                        <input type="file" name="image" class="form-control" id="inputGroupImg">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="form-control btn btn-primary rounded submit px-3 ">Modifier image de profil</button>
                                                    </div>
                                                    <br /> <br /> 
                                                </form>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
            </div>

            <!-- formulaire start-->
        </div>

    </div>

    </div>

    <div class="container">




    </div>


</body>

</html>
