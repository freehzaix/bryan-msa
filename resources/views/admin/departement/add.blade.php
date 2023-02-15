@extends('admin.layouts.admin')

@section('content')
<div class="form-grids row widget-shadow" data-example-id="basic-forms">
    <div class="form-title">
        <h4>Ajouter un département</h4>
    </div>
    <div class="form-body">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="/admin/departement/add/traitement" method="POST">
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Code du département</label>
                <input type="text" class="form-control" name="departement_code" placeholder="Code du département">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Colonne</label>
                <select name="colonne_id" class="form-control">
                    <option value="">Choisir la colonne</option>
                    @foreach ($colonnes as $colonne)
                    <option value="{{ $colonne->id }}">{{ $colonne->colonne_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="departement_name">Nom du département</label>
                <input type="text" class="form-control" name="departement_name" id="departement_name" placeholder="Nom du département">
            </div>

            <button type="submit" class="btn btn-default">Enregistrer les modifications</button>
        </form>
    </div>
</div>

@endsection
