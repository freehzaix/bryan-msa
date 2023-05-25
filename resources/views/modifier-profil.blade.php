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
                            <i class="fa-solid fa-house-user"></i> {{ session('membre')->prenom }} {{ session('membre')->nom }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/modifier-profil">Modifier profil</a></li>
                            <li><a class="dropdown-item" href="/logout">Deconnection</a></li>
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

            <div class="col-md-4 ">
                <div class="card mb-3 shadow p-3 mb-5 bg-body rounded border-0" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="/storage/images/{{ session('membre')->image }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body font-roboto ">
                                <h5 class="card-title fw-bold text-warning">{{ session('membre')->nom }} {{ session('membre')->prenom }}</h5>
                                <p class="card-text text-capitalize fw-semibold"> <i
                                        class="fa-solid fa-building-user"></i> Colonne: {{  $colonne->colonne_name }} </p>
                                <p class="card-text text-capitalize fw-semibold"> <i
                                        class="fa-solid fa-building-user"></i> Departement: {{ $departement->departement_name }}</p>
                                <p class="card-text fw-semibold"> <i class="fa-solid fa-mobile-screen-button"></i>
                                    {{ session('membre')->telephone }}</p>
                                <p class="card-text text-capitalize fst-italic"><small class="text-muted"><i
                                            class="fa-solid fa-map-location-dot"></i> Habite {{ session('membre')->quartier }}</small></p>
                                            <a href="mailto:{{ session('membre')->email }}">{{ session('membre')->email }}</a>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
