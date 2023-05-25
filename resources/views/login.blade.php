@extends('layouts.form')

@section('title')
    Connexion
@endsection

@section('content')
    <section class="ftco-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(./frontend/Assets/images/msa-register-img.jpg);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Se connecter </h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="/login"
                                            class="social-icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-arrow-left" aria-hidden="true"></span>
                                        </a>
                                    </p>
                                </div>

                            </div>

                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="alert alert-danger">
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            <form action="./login/traitement" method="POST" class="signin-form">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="email">Email</label>
                                    <input type="text" class="form-control" name="email"
                                        placeholder="Entrez votre mail" required>
                                    @if ($errors->has('email'))
                                        <p style="color: red;">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Mot de passe </label>
                                    <input type="password" class="form-control" name="motdepasse"
                                        placeholder="Entrez votre Mot de passe" required>
                                    @if ($errors->has('motdepasse'))
                                        <p style="color: red;">{{ $errors->first('motdepasse') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Se
                                        connecter</button>
                                </div>

                            </form>

                            <p class="text-center">Pas encore membre? <a href="./register" target="_parent">S'inscrire</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
