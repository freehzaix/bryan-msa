@extends('layouts.form')

@section('title')
    Ajouter une colonne
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
                                    <h3 class="mb-4">Colonne </h3>
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

                            @if (session('status'))
                                <div class="alert alert-succes">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form action="/colonne/add/traitement" method="POST" class="signin-form">
                                @csrf

                                <div class="form-group mb-3">
                                    <label class="label" for="colonne_code">Code de la colonne</label>
                                    <input type="text" id="colonne_code" name="colonne_code" class="form-control"
                                        placeholder="Entrez le code de la colonne" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label" for="colonne_name">Nom de la colonne</label>
                                    <input type="text" id="colonne_name" name="colonne_name" class="form-control"
                                        placeholder="Entrez le nom de la colonne" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit"
                                        class="form-control btn btn-primary rounded submit px-3">Enregistrer</button>
                                </div>

                            </form>
                            <p class="text-center"><a href="/departement/add" target="_parent">Ajouter les départements</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
