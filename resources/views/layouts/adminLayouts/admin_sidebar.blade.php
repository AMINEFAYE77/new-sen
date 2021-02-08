<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Entreprise</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{route('dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Tableau de Bord

                        </p>
                    </a>

                </li>


                <li class="nav-header">Section Produit</li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>
                            Produits
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('products.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ajouter un produit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('products.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mes produits</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('allproducts')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tous les products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('search_product')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Recherche avancée</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Section Appel</li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-phone-alt"></i>
                        <p>
                            Appels
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('appels.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ajouter un appel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('appels.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>liste des appels</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('search_appel')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Recherche avancée</p>
                            </a>
                        </li>

                    </ul>
                </li>


               @can('managers-users')
                    <li class="nav-header">Section Gestion Utilisateurs</li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-phone-alt"></i>
                            <p>
                                Utilisateurs et Roles
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('users.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter un utitlisateurs</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('users.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>liste les utilisateurs & Roles</p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                 <a href="{{route('search_appel')}}" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Recherche avancée</p>
                                 </a>
                             </li>--}}

                        </ul>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
