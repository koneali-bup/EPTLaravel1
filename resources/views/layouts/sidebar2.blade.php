<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('index1') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Etudiant <sup>2</sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('index1') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>


    

    <!-- Nav Item - Profil -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('profile') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Profil</span>
        </a>
    </li>

        <!-- Nav Item - étudiant -->
        <h5 class="btn btn-danger"><strong><em> table cour</em></strong></h5>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('etudiants.create') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>ajouter</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cours.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>liste</span>
        </a>
    </li>


            <!-- Nav Item - enseignant -->
        <h5 class="btn btn-success"><strong><em> table note</em></strong></h5>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('enseignants.create') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>ajouter</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('enseignants.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>liste</span>
        </a>
    </li>

    <!-- Nav Item - Déconnexion -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Déconnexion</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</ul>
