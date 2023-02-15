@extends('admin.layouts.admin')

@section('content')
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>Mes informations personnelles :</h4>
        </div>
        <div class="form-body">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('update_profile_admin') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="number" class="form-control" name="id" value="{{ session('admin')->id }}" style="display: none;" />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Adresse mail</label>
                    <input type="email" class="form-control" name="email" disabled value="{{ session('admin')->email }}"
                        id="exampleInputEmail1" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" value="{{ session('admin')->nom }}"
                        id="nom" placeholder="Nom">
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" name="prenom" value="{{ session('admin')->prenom }}"
                        id="prenom" placeholder="Prénom">
                </div>

                <button type="submit" class="btn btn-default">Enregistrer les modifications</button>
            </form>
        </div>
    </div>
@endsection
