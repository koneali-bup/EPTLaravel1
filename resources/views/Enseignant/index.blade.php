@extends('layouts.app')

@section('title', 'Liste des Étudiants')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Liste des Étudiants</h6>
        </div>
        <div class="card-body">
            <!-- Bouton Ajouter un étudiant -->
            <a href="{{ route('enseignants.store') }}" class="btn btn-primary mb-3">Ajouter un étudiant</a>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($enseignants as $enseignant)
                            <tr>
                                <td>{{ $enseignant->name }}</td>
                                <td>{{ $enseignant->email }}</td>
                                <td>
                                    <!-- Afficher l'image si elle existe -->
                                    @if ($enseignant->image)
                                        <img src="{{ asset('storage/' . $enseignant->image) }}" alt="Image de {{ $enseignant->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                    @else
                                        <span>Aucune image</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Bouton Modifier -->
                                    <a href="{{ route('enseignants.edit', $enseignant->id) }}" class="btn btn-warning btn-sm">Modifier</a>

                                    <!-- Formulaire de suppression -->
                                    <form action="{{ route('enseignants.destroy', $enseignant->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
