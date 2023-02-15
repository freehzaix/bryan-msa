@extends('admin.layouts.admin')

@section('content')
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>Changer mon mot de passe :</h4>
        </div>
        <div class="form-body">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('update_password_admin') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="number" class="form-control" name="id" value="{{ session('admin')->id }}"
                        style="display: none;" />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Adresse mail</label>
                    <input type="email" class="form-control" name="email" disabled value="{{ session('admin')->email }}"
                        id="exampleInputEmail1" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="password">Nouveau mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Nouveau mot de passe">
                </div>

                <div class="form-group">
                    <label for="re_password">Confirmation du mot de passe</label>
                    <input type="password" class="form-control" name="password_confirmation" id="re_password" placeholder="Nouveau mot de passe">
                </div>

                <button type="submit" class="btn btn-default">Enregistrer les modifications</button>
            </form>
        </div>
    </div>
@endsection
