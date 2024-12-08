@extends('layouts.app')

@section('title', 'Dashboard - Ajouter ou Modifier un étudiant')

@section('content')
<div class="container-fluid">
    <div class="row">

        <!-- Formulaire pour ajouter un étudiant -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ajouter un étudiant</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Nom -->
                        <div class="form-group">
                            <label for="first_name">Prénom</label>
                            <input type="text" id="first_name" name="first_name" class="form-control" required>
                        </div>

                        <!-- Prénom -->
                        <div class="form-group">
                            <label for="last_name">Nom</label>
                            <input type="text" id="last_name" name="last_name" class="form-control" required>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Adresse e-mail</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <!-- Date de naissance -->
                        <div class="form-group">
                            <label for="birth_date">Date de naissance</label>
                            <input type="date" id="birth_date" name="birth_date" class="form-control" required>
                        </div>

                        <!-- Photo de profil (facultatif) -->
                        <div class="form-group">
                            <label for="profile_picture">Photo de profil</label>
                            <input type="file" id="profile_picture" name="profile_picture" class="form-control">
                        </div>

                        <!-- Button to submit the form -->
                        <button type="submit" class="btn btn-primary btn-block">Ajouter l'étudiant</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Formulaire pour modifier un étudiant -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Modifier un étudiant</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nom -->
                        <div class="form-group">
                            <label for="first_name">Prénom</label>
                            <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name', $student->first_name) }}" required>
                        </div>

                        <!-- Prénom -->
                        <div class="form-group">
                            <label for="last_name">Nom</label>
                            <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name', $student->last_name) }}" required>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Adresse e-mail</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $student->email) }}" required>
                        </div>

                        <!-- Date de naissance -->
                        <div class="form-group">
                            <label for="birth_date">Date de naissance</label>
                            <input type="date" id="birth_date" name="birth_date" class="form-control" value="{{ old('birth_date', $student->birth_date) }}" required>
                        </div>

                        <!-- Photo de profil (facultatif) -->
                        <div class="form-group">
                            <label for="profile_picture">Photo de profil</label>
                            <input type="file" id="profile_picture" name="profile_picture" class="form-control">
                            @if($student->profile_picture)
                                <img src="{{ asset('storage/' . $student->profile_picture) }}" alt="Profile Picture" class="img-thumbnail mt-2" width="100">
                            @endif
                        </div>

                        <!-- Button to submit the form -->
                        <button type="submit" class="btn btn-warning btn-block">Modifier l'étudiant</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
