@extends('admin.layouts.admin')

@section('content')
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="panel-body widget-shadow">
            <h4>Liste des membres</h4>
            <hr>
            @if (session('status'))
                <div class="alert alert-success">
                    {{  session('status') }}
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Quartier</th>
                        <th>Colonne</th>
                        <th>Département</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                        $ite = 1;
                    @endphp
                    @foreach ($membres as $membre)
                        <tr>
                            <th scope="row">{{ $ite }}</th>
                            <td>{{ $membre->nom }}</td>
                            <td>{{ $membre->prenom }}</td>
                            <td>{{ $membre->email }}</td>
                            <td>{{ $membre->telephone }}</td>
                            <td>{{ $membre->quartier }}</td>
                            <td>{{ $membre->colonne }}</td>
                            <td>{{ $membre->departement }}</td>
                            <td>
                                <a href="/admin/membres/update/{{$membre->id}}" class="btn btn-info">Update</a>
                                <a href="/admin/membres/delete/{{$membre->id}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @php
                            $ite += 1;
                        @endphp
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
