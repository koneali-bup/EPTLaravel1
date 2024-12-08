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

                    <!-- Formulaire pour ajouter un cour -->
                    <form action="{{ route('cours.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Nom -->
                        <div class="form-group">
                            <label for="name">Nom du cours</label>
                            <input type="text" id="nom" name="nom" class="form-control" required>
                        </div>

                        <!-- Photo de profil (facultatif) -->
                        <div class="form-group">
                            <label for="profile_picture">Document PD</label>
                            <input type="file" id="profile_picture" name="document" class="form-control">
                        </div>

                        <!-- Bouton pour soumettre le formulaire -->
                        <button type="submit" class="btn btn-primary btn-block">Ajouter le cour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
