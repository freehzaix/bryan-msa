@extends('admin.layouts.admin')

@section('content')
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="panel-body widget-shadow">
            <h4>Liste des départements</h4>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Code</th>
                        <th>Colonne</th>
                        <th>Département</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $ite = 1;
                    @endphp
                    @foreach ($departements as $departement)
                        <tr>
                            <th scope="row">{{ $ite }}</th>
                            <td>{{ $departement->departement_code }}</td>
                            <td>{{ $departement->colonne_name }}</td>
                            <td>{{ $departement->departement_name }}</td>
                            <td>
                                <a href="#" class="btn btn-info">Update</a>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @php
                            $ite += 1;
                        @endphp

                    @endforeach

                </tbody>
            </table>
            {{ $departements->links() }}
        </div>
    </div>
@endsection
