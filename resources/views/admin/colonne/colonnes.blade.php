@extends('admin.layouts.admin')

@section('content')
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="panel-body widget-shadow">
            <h4>Liste des colonnes</h4>
            <hr>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Code</th>
                        <th>Nom</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $ite = 1;
                    @endphp
                    @foreach ($colonnes as $colonne)
                        <tr>
                            <th scope="row">{{ $ite }}</th>
                            <td>{{ $colonne->colonne_code }}</td>
                            <td>{{ $colonne->colonne_name }}</td>
                            <td>
                                <a href="/admin/colonnes/update/{{$colonne->id}}" class="btn btn-info">Update</a>
                                <a href="/admin/colonnes/delete/{{$colonne->id}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @php
                            $ite += 1;
                        @endphp
                    @endforeach

                </tbody>
            </table>
            {{ $colonnes->links() }}
        </div>
    </div>
@endsection
