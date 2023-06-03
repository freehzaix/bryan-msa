@extends('layouts.form')

@section('title')
    Mot de passe oublié
@endsection

@section('content')
    <section class="ftco-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(./frontend/Assets/images/msa-register-img.jpg);">
                        </div>
                        <div class="login-wrap p-3 p-md-6">

                            <h3 class="mb-1">Mot de passe oublié</h3>

                            @if(session('status'))
                                <div class="alert alert-success"> {{ session('status') }} </div>
                            @endif

                            @if(session('erreur'))
                                <div class="alert alert-danger"> {{ session('erreur') }} </div>
                            @endif
                            
                            <form action="{{ route('motdepasse_oublie') }}" method="POST" class="signin-form">
                                @csrf

                                <div class="form-group mb-3">
                                    <label class="label" for="email">Email</label>
                                    <input type="text" class="form-control" name="email"
                                        placeholder="Entrez votre mail">

                                    @if ($errors)
                                        @foreach ($errors->all() as $error)
                                            <div class="text text-danger"> {{ $error }} </div>
                                        @endforeach  
                                    @endif

                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Réinitialiser le mot de passe</button>
                                </div>

                            </form>
                            <p class="text-center">Déja membre? <a href="{{ route('login') }}"> Se connecter </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
