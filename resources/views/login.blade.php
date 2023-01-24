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
                    <div class="img" style="background-image: url(/frontend/Assets/images/msa-register-img.jpg);">
                    </div>
                    <div class="login-wrap p-4 p-md-5">
                <div class="d-flex">
                    <div class="w-100">
                        <h3 class="mb-4">Se connecter </h3>
                    </div>
                            <div class="w-100">
                                <p class="social-media d-flex justify-content-end">
                                    <a href="/login" class="social-icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-arrow-left" aria-hidden="true"></span>
                                </a>
                                </p>
                            </div>
                </div>
                        <form action="#" class="signin-form">
                            <div class="form-group mb-3">
                                <label class="label" for="email">Email</label>
                                <input type="text" class="form-control" placeholder="Entrez votre mail" required>
                            </div>
                        <div class="form-group mb-3">
                            <label class="label" for="password">Mot de passe </label>
                        <input type="password" class="form-control" placeholder="Entrez votre Mot de passe" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">valider</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50 text-left">
                                <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                    <input type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                                <div class="w-50 text-md-right">
                                    <a href="#">Mot de passe oublé ?</a>
                                </div>
                </div>
                </form>
                <p class="text-center">Pas encore membre? <a href="/register" target="_parent">S'inscrire</a></p>
            </div>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection
