@extends('layouts.form')

@section('title')
    Ajouter un département
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
                                    <h3 class="mb-4">Département </h3>
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
                            <form action="/departement/add/traitement" method="POST" class="signin-form">
                                @csrf

                                <div class="form-group mb-3">
                                    <label class="label" for="departement_code">Code du département</label>
                                    <input type="text" id="departement_code" name="departement_code" class="form-control"
                                        placeholder="Entrez le code du département" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label" for="departement_name">Nom du département</label>
                                    <input type="text" id="departement_name" name="departement_name" class="form-control"
                                        placeholder="Entrez le nom du département" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label" for="colone">Choisir sa Colone</label>
                                    <select id="inputcolone" name="colonne_id" class="form-select" required>

                                        @foreach ($colonnes as $colonne)
                                            <option value="{{ $colonne->id }}">{{ $colonne->colonne_code }}: {{ $colonne->colonne_name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit"
                                        class="form-control btn btn-primary rounded submit px-3">Enregistrer</button>
                                </div>

                            </form>
                            <p class="text-center"><a href="/colonne/add" target="_parent">Ajouter les colonnes</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
