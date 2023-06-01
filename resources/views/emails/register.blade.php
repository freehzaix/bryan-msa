<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h2>Bienvenue sur l'espace membre de la MSA</h2>

    <p>
        Bonjour <b>{{ $data['prenom'] }}</b>, ton inscription a bien été effectué.
    </p>

    <p>
        Vous pouvez vous connecter avec votre adresse mail <a href="#" rel="noopener noreferrer">{{ $data['email'] }}</a> 
        et le mot de passe que vous avez défini lors de votre inscription  
        sur notre plateforme <a href="{{ route('login') }}">membres.msa.ci</a>.
    </p>

</body>
</html>