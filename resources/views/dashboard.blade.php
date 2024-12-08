@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Bienvenue sur votre Dashboard</h1>
            <p>Voici un aperçu de votre tableau de bord.</p>
        </div>
    </div>

    <div class="row">
        <!-- Card - Nombre d'étudiants -->
        <div class="col-xl-6 col-md-12 mb-4">
            <div class="card shadow h-100 py-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Nombre d'Étudiants
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $etudiantsCount }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card - Nombre d'enseignants -->
        <div class="col-xl-6 col-md-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Nombre d'Enseignants
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $enseignantsCount }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection