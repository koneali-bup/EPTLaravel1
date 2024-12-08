@extends('layouts.app')

@section('title', 'Liste des cours')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Liste des cours</h6>
        </div>
        <div class="card-body">
            <!-- Bouton Ajouter un étudiant -->
            <a href="{{ route('cours.create') }}" class="btn btn-primary mb-3">Ajouter un cour</a>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nom du cours</th>
                            <th>>Document PDF</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cours as $cour)
                            <tr>
                                <td>{{ $cour->nom }}</td>
                                <td>
                                    @if ($cour->document)
                                        <a href="{{ asset('storage/' . $cour->document) }}" target="_blank">Télécharger le PDF</a>
                                    @else
                                        Pas de document
                                    @endif
                                </td>
                                <td>
                                    <!-- Bouton Modifier -->
                                    <a href="{{ route('enseignants.edit', $cour->id) }}" class="btn btn-warning btn-sm">Modifier</a>

                                    <!-- Formulaire de suppression -->
                                    <form action="{{ route('enseignants.destroy', $cour->id) }}" method="POST" style="display:inline;">
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
