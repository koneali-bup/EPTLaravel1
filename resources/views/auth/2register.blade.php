@extends('layouts.app')


@section('titre')
    <title>AJOUTER</title>
@endsection


@section('content')
<div class="container">
    <h1>Ajouter un Étudiant</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('etudiants.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nom">nom</label>
            <input type="text" name="name" id="matricule" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nom">email</label>
            <input type="text" name="email" id="nom" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="col-sm-6">
            <label for="password">confimer Mot de passe</label>
            <input type="password" class="form-control form-control-user" id="exampleRepeatPassword">
        </div>

        <button type="submit" class="btn btn-primary">Ajouter l'Étudiant</button>
    </form>

</div>
@endsection
