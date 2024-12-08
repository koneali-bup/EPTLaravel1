@extends('layouts.app')

@section('title', 'Mon Profil')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Profile Information Section -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informations personnelles</h6>
                </div>
                <div class="card-body">
                    <!-- Affichage des messages de succès ou d'erreur -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Full Name -->
                        <div class="form-group">
                            <label for="name">Nom complet</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', Auth::user()->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Adresse e-mail</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', Auth::user()->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Profile Picture -->
                        <div class="form-group">
                            <label for="profile_picture">Photo de profil</label>
                            <input type="file" id="profile_picture" name="profile_picture" class="form-control @error('profile_picture') is-invalid @enderror">
                            @error('profile_picture')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if(Auth::user()->profile_picture)
                                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture" class="img-thumbnail mt-2" width="100">
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary btn-block">Mettre à jour les informations</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Change Password Section -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Modifier le mot de passe</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        @method('PUT')

                        <!-- Current Password -->
                        <div class="form-group">
                            <label for="current_password">Mot de passe actuel</label>
                            <input type="password" id="current_password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required>
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div class="form-group">
                            <label for="new_password">Nouveau mot de passe</label>
                            <input type="password" id="new_password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" required>
                            @error('new_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm New Password -->
                        <div class="form-group">
                            <label for="new_password_confirmation">Confirmer le nouveau mot de passe</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control @error('new_password_confirmation') is-invalid @enderror" required>
                            @error('new_password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-warning btn-block">Changer le mot de passe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
