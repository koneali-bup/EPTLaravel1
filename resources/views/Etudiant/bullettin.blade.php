@extends('layouts.app')

@section('title', 'Liste des Étudiants')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bulletin de {{ $etudiant->nom }} {{ $etudiant->prenom }}</h6>
        </div>
        <div class="card-body">
            <!-- Bouton Ajouter un étudiant -->
            <a href="{{ route('etudiants.store') }}" class="btn btn-primary mb-3">Ajouter un étudiant</a>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Matière</th>
                            <th>Moyenne</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($moyennes as $matiere_id => $moyenne)
                            <tr>
                                <td>{{ $etudiant->notes->firstWhere('matiere_id', $matiere_id)->matiere->nom }}</td>
                                <td>{{ number_format($moyenne, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
