<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="./frontend/Assets/js/color-modes.js"></script>

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
    <style>
        /*Fade Hover Effect*/
        .hover-fade a {
            display: block;
            position: relative;
            overflow: hidden;
            background-color: #333;
        }

        .hover-fade {

            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            -ms-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
        }

        .hover-fade:hover {
            -webkit-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -o-transform: scale(1.2);
            -ms-transform: scale(1.2);
            transform: scale(1.2);
            -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=0.5)";
            filter: alpha(opacity=0.5);
            opacity: 0.5;
        }

        .imgbg {
            background-image: url(../../frontend/Assets/images/pexels-jean-van-der-meulen-1547706.jpg);
            background-size: cover;
            width: 100%;
            height: 350px;

        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }
    </style>


</head>

<body>

    <header>
        
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
                            <li><a class="dropdown-item" href="../../modifier-profil">Modifier profil</a></li>
                            <li><a class="dropdown-item" href="../../logout">Deconnection</a></li>
                            <!--  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    </header>

    <main>

        <section class="py-5 text-center  container">
            <div class="row py-lg-5">
                <div class="col-lg-8 col-md-8 mx-auto">
                    <h2 class="fw-light">Bienvenue, sur la liste des départements de la colonne <b>{{ $colonne->colonne_name }}</b> de la MSA</h2>
                    <!--  <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>-->
                </div>
            </div>
        </section>

        <div class="album py-5 bg-body-tertiary">
            <div class="container">

                <div class="row mt-4">

                    @foreach ($membres as $membre)
                    
                        <div class="col-md-4 mb-4">
                            <a href="#" class="text-white">
                                
                                <div class="card shadow-sm text-bg-dark imgbg ">
                                    
                                    <div class="card-img-overlay ">
                                        <div class="row">
                                            <div class="col-3">
                                                <img src="../../storage/{{  $membre->image }}" class="img-fluid rounded-start" alt="...">   
                                            </div>
                                            <div class="col-9 mt-4">
                                                <h5 class="card-title text-uppercase">{{ $membre->prenom }} {{ $membre->nom }}</h5>
                                                <h6 class="card-title text-uppercase">{{ $membre->telephone }}</h6>
                                                <h6 class="card-title">{{ $membre->quartier }}</h6>
                                                <p class="card-title">{{ $membre->email }}</p>
                                                <p class="card-title">{{ $membre->situation_matrimoniale }}</p>
                                                <p class="card-title">
                                                    @php
                                                        $departements = DB::table('departements')->where('id', $membre->departement)->get();
                                                    @endphp
                                                    @foreach($departements as $departement)
                                                        <p>{{ $departement->departement_name }}</p>
                                                    @endforeach
                                                </p>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>

            </div>

        </div>

    </main>

    <footer class="text-body-secondary py-2 " style="background-color: #000000;">
        <div class="container text-white-50">
            <p class="float-end mb-1">
                <a href="#">En haut</a>
            </p>
            <p>2023 Copyright <a href="" class="text-white">MSA</a>, Dévélopper par <a
                    href="https://twitter.com/mdo" class="text-white">X-TEAM</a>.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
