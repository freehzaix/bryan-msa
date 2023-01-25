<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Espace membre - MSA</title>

    <!-- Font Awesome -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <!-- MDB -->

    <!-- Main css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/frontend/Assets/css/memb.css">

</head>

<body>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Navbar</span>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg  fixed-top" style="background-color: #0d8ae2;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MSA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Bienvenue</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ session('membre')->prenom }} {{ session('membre')->nom }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/logout">Deconnection</a></li>
                            <!--  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="row row-cols-1 row-cols-md-4 g-4">

        @foreach ($membres as $membre)

        <div class="col">
            <div class="card">
                <img src="/storage/images/{{ $membre->image }}" class="card-img-top img-thumbnail" alt="{{ $membre->image }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $membre->nom }} {{ $membre->prenom }}</h5>
                    <p class="card-text">
                        {{ $membre->telephone }} <br />
                        {{ $membre->quartier }} <br />
                        {{ $membre->colonne }} <br />
                        {{ $membre->departement }} <br />
                        <a href="mailto:{{ $membre->email }}">{{ $membre->email }}</a>
                    </p>
                </div>
            </div>
        </div>

        @endforeach

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>