<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title> <!-- Correction du titre dynamique -->

    <!-- Liens vers les styles -->
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- Styles personnalisés -->
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        @include('layouts.sidebar') <!-- Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('layouts.navbar') <!-- Navbar -->

                <div class="container-fluid">
                    <!-- Titre de la page -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
                    </div>  

                    <!-- Contenu spécifique -->
                    @yield('content') <!-- Contenu de chaque page -->
                </div>
            </div>
            
            @include('layouts.footer') <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Scripts -->
    <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin_assets/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin_assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin_assets/js/demo/chart-pie-demo.js') }}"></script>
</body>
</html>
