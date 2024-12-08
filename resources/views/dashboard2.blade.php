@extends('layouts.app2')

@section('title')
    Dashboard Enseignant
@endsection

@section('content')


<div class="container mt-5">
    <h1 class="text-center mb-4">Dashboard de {{ $etudiant->nom }} {{ $etudiant->prenom }}</h1>

    <!-- Afficher la moyenne générale -->
    <div class="mb-4">
        <h3>Moyenne générale : {{ number_format($moyenne_generale, 2) }}</h3>
    </div>

    <!-- Tableau des moyennes par matière -->
    <h4 class="mb-3">Moyenne par matière</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Matière</th>
                <th>Moyenne</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($moyennes as $matiereId => $moyenne)
                <tr>
                    <td>{{ $etudiant->notes->firstWhere('matiere_id', $matiereId)->matiere->nom }}</td>
                    <td>{{ number_format($moyenne, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Lien pour télécharger le bulletin -->
    <div class="mt-4">
        <a href="{{ route('bulletin.generate') }}" class="btn btn-primary" target="_blank">Télécharger mon bulletin</a>
    </div>
</div>

        <!-- Autres cartes ou widgets pour l'enseignant -->
    </div>
@endsection