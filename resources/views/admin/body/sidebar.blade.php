@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Easy</b> School</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ ($route == 'dashboard' ? 'active' : '') }}">
                <a href="{{ route('dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ ($prefix == '/users' ? 'active' : '') }}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Gestion des Utilisateurs</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.view') }}"><i class="ti-more"></i>Liste des Utilisateurs</a></li>
                    <li><a href="{{ route('users.add') }}"><i class="ti-more"></i>Ajouter un Utilisateur</a></li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == '/profile' ? 'active' : '') }} ">
                <a href="#">
                    <i data-feather="mail"></i> <span>Gestion des profils</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Votre profil</a></li>
                    <li><a href="{{ route('password.view') }}"><i class="ti-more"></i>Modifier le mot de passe</a></li>
                    
                </ul>
            </li>
        
            <li class="treeview {{ ($prefix == '/hockey' ? 'active' : '') }} ">
                <a href="#">
                    <i data-feather="mail"></i> <span>Sport</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('pat.view') }}"><i class="ti-more"></i>Patinoires</a></li>
                    <li><a href="{{ route('pat.add') }}"><i class="ti-more"></i>Ajouter une patinoire</a></li>
                    <li><a href="{{ route('team.view') }}"><i class="ti-more"></i>Equipe</a></li>
                    <li><a href="{{ route('team.add') }}"><i class="ti-more"></i>Ajouter une équipe</a></li>
                    <li><a href="{{ route('poste.view') }}"><i class="ti-more"></i>Poste</a></li>
                    <li><a href="{{ route('poste.add') }}"><i class="ti-more"></i>Ajouter un poste</a></li>
                    <li><a href="{{ route('player.view') }}"><i class="ti-more"></i>Joueurs</a></li>
                    <li><a href="{{ route('player.add') }}"><i class="ti-more"></i>Ajouter un joueur</a></li>
                    <li><a href="{{ route('compet.view') }}"><i class="ti-more"></i>Matchs</a></li>
                    <li><a href="{{ route('compet.add') }}"><i class="ti-more"></i>Ajouter un Match</a></li>
                    <li><a href="{{ route('table.view') }}"><i class="ti-more"></i>Résultats</a></li>
                    <li><a href="{{ route('goal.view') }}"><i class="ti-more"></i>Goals</a></li>
                    <li><a href="{{ route('goal.add') }}"><i class="ti-more"></i>Ajouter un Goal</a></li>
                    <li><a href="{{ route('goal.rang') }}"><i class="ti-more"></i>Buteurs</a></li>
                    

                    
                </ul>
            </li>

            <li class="treeview {{ ($prefix == '/content' ? 'active' : '') }} ">
                <a href="#">
                    <i data-feather="mail"></i> <span>Compe-Rendu</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('writer.view') }}"><i class="ti-more"></i>Auteurs</a></li>
                    <li><a href="{{ route('writer.add') }}"><i class="ti-more"></i>Ajouter un auteurl</a></li>
                    <li><a href="{{ route('recit.view') }}"><i class="ti-more"></i>Comptes-Rendus</a></li>
                    <li><a href="{{ route('recit.add') }}"><i class="ti-more"></i>Ajouter un compte-rendu</a></li>
                    <li><a href="{{ route('carou.view') }}"><i class="ti-more"></i>Carrousel</a></li>
                    <li><a href="{{ route('carou.add') }}"><i class="ti-more"></i>Ajouter un carrousel</a></li>
                    <li><a href="{{ route('filter.view') }}"><i class="ti-more"></i>Filtre</a></li>
                    <li><a href="{{ route('filter.add') }}"><i class="ti-more"></i>Ajouter un filtre</a></li>

                </ul>
            </li>
       
            <li class="treeview {{ ($prefix == '/shop' ? 'active' : '') }} ">
                <a href="#">
                    <i data-feather="mail"></i> <span>Boutique</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('cat.view') }}"><i class="ti-more"></i>Catégorie</a></li>
                    <li><a href="{{ route('cat.add') }}"><i class="ti-more"></i>Ajouter une catégorie</a></li>
                    <li><a href="{{ route('subcat.view') }}"><i class="ti-more"></i>Sous-Catégorie</a></li>
                    <li><a href="{{ route('subcat.add') }}"><i class="ti-more"></i>Ajouter une sous-catégorie</a></li>
                    <li><a href="{{ route('product.view') }}"><i class="ti-more"></i>Produits</a></li>
                    <li><a href="{{ route('product.add') }}"><i class="ti-more"></i>Ajouter un produit</a></li>
                    <li><a href="{{ route('userorder') }}"><i class="ti-more"></i>Commandes</a></li>
                    

                </ul>

                
            </li>






   


        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
            aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                class="ti-lock"></i></a>
    </div>
</aside>
