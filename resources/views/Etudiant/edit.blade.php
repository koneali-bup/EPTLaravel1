@extends('layouts.app')

@section('title', 'Modifier Étudiant')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Modifier Étudiant</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $etudiant->name }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ $etudiant->email }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>

                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>
        </div>
    </div>
@endsection
