<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Se connecter</title>
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenue !</h1>
                                    </div>
                                    <form action="{{ route('login.action') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Adresse Email</label>
                                            <input type="email" name="email" class="form-control form-control-user" id="email"
                                                   placeholder="Entrez votre adresse email..." value="{{ old('email') }}" required>
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Mot de passe</label>
                                            <input type="password" name="password" class="form-control form-control-user" id="password"
                                                   placeholder="Mot de passe" required>
                                            @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Choisir le rôle (Administrateur ou Enseignant) -->
                                        <div class="form-group">
                                            <label for="role">Se connecter en tant que :</label>
                                            <select name="role" class="form-control" id="role" required>
                                                <option value="admin">Administrateur</option>
                                                <option value="enseignant">Enseignant</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" name="remember" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Se souvenir de moi</label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-block btn-primary btn-lg">Se connecter</button>
                                    </form>
                                    <div class="text-center mt-4">
                                        <a class="small" href="{{ route('register') }}">Créer un compte</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>

</html>
