<!doctype html>
<html lang="en">
<head>
<title>@yield('title') - MSA</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/frontend/Assets/css/login-style.css">

</head>
<body>
<header>
    <div class="row">
        <div class="img img-head" style="background-image: url(/frontend/Assets/images/msa-register-img.jpg);">
            <div class="w-100 text-center typewriter">
                <h1 class="mt-4 reg-text"> Bienvenue</h1>
                </div>
        </div>
    </div>
</header>

@yield('content')

<script src="/frontend/Assets/js/jquery.min.js"></script>
<script src="/frontend/Assets/js/popper.js"></script>
<script src="/frontend/Assets/js/bootstrap.min.js"></script>
<script src="/frontend/Assets/js/main.js"></script>

</body>
</html>

