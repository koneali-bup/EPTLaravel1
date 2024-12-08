<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Créer un compte</title>
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Styles personnalisés pour ce modèle-->
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Row imbriqué dans le corps de la carte -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Créer un compte !</h1>
                            </div>

                            <!-- Formulaire d'inscription -->
                            <form action="{{ route('register.save') }}" method="POST">
                                @csrf

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

                                <!-- Nom et Email -->
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="name" class="form-control form-control-user" id="inputName" placeholder="Nom" value="{{ old('name') }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email" name="email" class="form-control form-control-user" id="inputEmail" placeholder="Email" value="{{ old('email') }}">
                                    </div>
                                </div>

                                <!-- Mot de passe et confirmation -->
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user" id="inputPassword" placeholder="Mot de passe">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="password_confirmation" class="form-control form-control-user" id="inputPasswordConfirmation" placeholder="Confirmer le mot de passe">
                                    </div>
                                </div>

                                <!-- Bouton d'enregistrement -->
                                <button type="submit" class="btn btn-block btn-primary btn-lg">S'inscrire</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript de base -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- JavaScript pour les plugins principaux -->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Scripts personnalisés pour toutes les pages -->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
