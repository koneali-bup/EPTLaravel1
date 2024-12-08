@extends('layouts.app')

@section('title', 'Ajouter un enseignant')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Formulaire pour ajouter un enseignant -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ajouter un enseignant</h6>
                </div>
                <div class="card-body">
                    <!-- Affichage des erreurs de validation -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Affichage du message de succès -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Formulaire pour ajouter un enseignant -->
                    <form action="{{ route('enseignants.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Nom -->
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Adresse e-mail</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <!-- Mot de passe et confirmation -->
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" name="password" class="form-control form-control-user" id="inputPassword" placeholder="Mot de passe" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" name="password_confirmation" class="form-control form-control-user" id="inputPasswordConfirmation" placeholder="Confirmer le mot de passe" required>
                            </div>
                        </div>    

                        <!-- Photo de profil (facultatif) -->
                        <div class="form-group">
                            <label for="profile_picture">Photo de profil</label>
                            <input type="file" id="profile_picture" name="image" class="form-control">
                        </div>

                        <!-- Bouton pour soumettre le formulaire -->
                        <button type="submit" class="btn btn-primary btn-block">Ajouter l'enseignant</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
