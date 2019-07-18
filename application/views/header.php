<!-- ***** Header Area Start ***** -->
    <header class="header_area" id="header">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <nav class="h-100 navbar navbar-expand-lg">
                        <a class="navbar-brand" href="<?= site_url() ?>"><img src="<?= assets_url('img/core-img/logo.png') ?>" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#dorneNav" aria-controls="dorneNav" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                        <!-- Nav -->
                        <div class="collapse navbar-collapse" id="dorneNav">
                            <ul class="navbar-nav mr-auto" id="dorneMenu">
                                <li class="nav-item active">
                                    <a class="nav-link" href="<?= site_url() ?>">Accueil <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('publications') ?>">Publications</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('annuaire') ?>">Annuaire</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('contacts') ?>">Contactez-nous</a>
                                </li>
                            </ul>
                            <!-- Signin btn -->
                            <div class="dorne-signin-btn">
                                <a href="<?= site_url('connexion') ?>">Connexion</a>
                            </div>
                            <div class="dorne-signin-btn">
                                <a href="<?= site_url('inscription') ?>">Inscription</a>
                            </div>
                            
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->