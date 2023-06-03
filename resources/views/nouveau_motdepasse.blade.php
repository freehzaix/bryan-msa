<!doctype html>
<html lang="fr">

<head>

    <meta name="googlebot" content="noindex, nofollow">

    <title>Nouveau mot de passe - MSA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./../frontend/Assets/css/login-style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <header>
        <div class="row">
            <div class="img img-head" style="background-image: url(./../frontend/Assets/images/msa-register-img.jpg);">
                <div class="w-100 text-center typewriter">
                    <h1 class="mt-4 reg-text"> Modifier le mot de passe</h1>
                </div>
            </div>
        </div>
    </header>
    <section class="ftco-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img"
                            style="background-image: url(./../frontend/Assets/images/msa-register-img.jpg);">
                        </div>
                        <div class="login-wrap p-3 p-md-6">

                            <h3 class="mb-1">Change votre mot de passe</h3>

                            <form action="{{ route('reset_password_post') }}" method="POST" class="signin-form">
                                @csrf
                                <input type="text" name="id" value="{{ $membre->id }}" style="display: none;" />

                                <div class="form-group mb-3">
                                    <label class="label" for="motdepasse">Nouveau mot de passe</label>
                                    <input type="password" class="form-control" name="motdepasse" placeholder="Entrez le nouveau mot de passe">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label" for="motdepasse2">Retapez le mot de passe</label>
                                    <input type="password" class="form-control" name="motdepasse2" placeholder="Retapez le nouveau mot de passe">
                                </div>

                                @if(session('error'))
                                    <div class="alert alert-danger"> {{ session('error') }} </div>
                                @endif

                                @if ($errors)
                                    @foreach ($errors->all() as $error)
                                        <div class="text text-danger"> {{ $error }} </div>
                                    @endforeach
                                @endif

                                <div class="form-group">
                                    <button type="submit"
                                        class="form-control btn btn-primary rounded submit px-3">Réinitialiser le mot de
                                        passe</button>
                                </div>

                                <p class="text-center"><a href="{{ route('login') }}"> Se connecter maintenant </a>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="./../frontend/Assets/js/jquery.min.js"></script>
    <script src="./../frontend/Assets/js/popper.js"></script>
    <script src="./../frontend/Assets/js/bootstrap.min.js"></script>
    <script src="./../frontend/Assets/js/main.js"></script>

</body>

</html>
