@extends('admin.layouts.admin')

@section('content')
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>Tableau de bord</h4>
        </div>
        <div class="form-body">

            <h3>Bonjour {{ session('admin')->prenom }}, tu es connecté en tant qu'administrateur.</h3>
            <hr>
            <p>
                C'est ici que nous allons créer:
                <ul>
                    <li>les colonnes</li>
                    <li>les départements</li>
                    <li>les membres (utilisateurs)</li>
                </ul>
            </p>

        </div>
    </div>
@endsection
