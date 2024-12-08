@extends('layouts.app')

@section('title', 'Modifier Étudiant')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Modifier Étudiant</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('enseignants.update', $enseignant->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $enseignant->name }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ $enseignant->email }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe (laisser vide si inchangé)</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>

                <!-- Photo de profil (facultatif) -->
                {{-- <div class="form-group">
                    <label for="profile_picture">Photo de profil</label>
                    <input type="file" id="profile_picture" name="image" class="form-control">
                    @if($student->profile_picture)
                        <img src="{{ asset('storage/' . $student->profile_picture) }}" alt="Profile Picture" class="img-thumbnail mt-2" width="100">
                    @endif
                </div>                --}}

                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>
        </div>
    </div>
@endsection
