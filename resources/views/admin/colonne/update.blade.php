@extends('admin.layouts.admin')

@section('content')
<div class="form-grids row widget-shadow" data-example-id="basic-forms">
    <div class="form-title">
        <h4>Modifier une colonne</h4>
    </div>
    <div class="form-body">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="/admin/colonnes/update/traitement" method="POST">
            @csrf

            <input type="text" name="id" value="{{ $colonnes->id }}" style="display: none;">

            <div class="form-group">
                <label for="exampleInputEmail1">Code de la colonne</label>
                <input type="text" class="form-control" name="colonne_code" value="{{ $colonnes->colonne_code }}" placeholder="Code de la colonne">
            </div>

            <div class="form-group">
                <label for="colonne_name">Nom de la colonne</label>
                <input type="text" class="form-control" name="colonne_name" value="{{ $colonnes->colonne_name }}" id="colonne_name" placeholder="Nom de la colonne">
            </div>

            <button type="submit" class="btn btn-default">Enregistrer les modifications</button>
        </form>
    </div>
</div>

@endsection
