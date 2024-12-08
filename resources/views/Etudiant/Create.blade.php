@extends('layouts.app')

@section('title', 'Ajouter un étudiant')

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

                    <!-- Formulaire pour ajouter un étudiant -->
                    <form action="{{ route('etudiants.store') }}" method="POST">
                        @csrf
                        <!-- Champ nom -->
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <!-- Champ email -->
                        <div class="form-group">
                            <label for="email">Adresse e-mail</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <!-- Champs mot de passe et confirmation -->
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" name="password" class="form-control form-control-user" id="inputPassword" placeholder="Mot de passe" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" name="password_confirmation" class="form-control form-control-user" id="inputPasswordConfirmation" placeholder="Confirmer le mot de passe" required>
                            </div>
                        </div>    

                        <!-- Bouton pour soumettre le formulaire -->
                        <button type="submit" class="btn btn-primary btn-block">Ajouter l'étudiant</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
