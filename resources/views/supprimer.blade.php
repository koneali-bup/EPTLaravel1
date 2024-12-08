@extends('layouts.app')

@section('title', 'Dashboard - Ajouter ou Modifier un étudiant')

@section('content')
<div class="container-fluid">
    <div class="row">

        <!-- Formulaire pour ajouter un étudiant -->
        <!-- Formulaire pour supprimer un étudiant -->
<div class="col-xl-6 col-lg-7">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Supprimer un étudiant</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('students.destroy', $student->id) }}">
                @csrf
                @method('DELETE')

                <p>Êtes-vous sûr de vouloir supprimer cet étudiant ? Cette action est irréversible.</p>
                
                <!-- Nom de l'étudiant -->
                <div class="form-group">
                    <label>Nom : {{ $student->first_name }} {{ $student->last_name }}</label>
                </div>

                <!-- Affichage de la photo de profil si elle existe -->
                @if($student->profile_picture)
                    <div class="form-group">
                        <label>Photo de profil :</label>
                        <img src="{{ asset('storage/profiles/' . $student->profile_picture) }}" alt="Photo de profil" class="img-thumbnail" width="150">
                    </div>
                @endif

                <!-- Confirmation de suppression -->
                <div class="form-group">
                    <p class="text-danger">Cette action supprimera définitivement l'étudiant et toutes ses données. Êtes-vous sûr ?</p>
                </div>

                <!-- Bouton de suppression -->
                <button type="submit" class="btn btn-danger btn-block">Supprimer l'étudiant</button>
            </form>
        </div>
    </div>
</div>

        </div>

    </div>
</div>
@endsection
