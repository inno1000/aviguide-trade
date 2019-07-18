<!-- ***** Welcome Area Start ***** -->
    <section class="dorne-welcome-area p-2 bg-img bg-overlay" style="background-image:url(<?= assets_url('img/bg-img/hero-1.jpg') ?>);">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-10">
                   
                    <!-- Hero Search Form -->
                    <div class="hero-search-form">
                        <!-- Tabs -->
                       
                        <!-- Tabs Content -->
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-places" role="tabpanel" aria-labelledby="nav-places-tab">
                                <h6>Que recherchez-vous?</h6>
                                <form action="#" method="get">
                                    <input type="text" name="name" class="form-control mr-2 custom-input" placeholder="">
                                    <select class="custom-select">
                                        <option selected>All Catagories</option>
                                        <option value="1">Catagories 1</option>
                                        <option value="2">Catagories 2</option>
                                        <option value="3">Catagories 3</option>
                                    </select>
                                    <select class="custom-select">
                                        <option selected>Price Range</option>
                                        <option value="1">$100 - $499</option>
                                        <option value="2">$500 - $999</option>
                                        <option value="3">$1000 - $4999</option>
                                    </select>
                                    <button type="submit" class="btn dorne-btn"><i class="fa fa-search pr-2" aria-hidden="true"></i> Chercher</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Features Destinations Area Start ***** -->
    <section class="dorne-features-destinations-area pb-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading dark text-center">
                        <span></span>
                        <h4>Publications récentes</h4>
                        <p>Retrouvez tous les offres aux meilleurs prix</p>
                    </div>
                </div>
            </div>
          <div class="row">
		  <?php foreach ($produits as $item) { ?>
            <div class="col-sm-12 col-lg-3 col-md-4">
                <div class="single-features-area p-0">
                    <img src="<?= assets_url("img/Produits/")."/".$item->img_produit ?>" alt="" style="height: 300px; width: 100%">                <!-- Price -->
                    <div class="price-start">
                        <p><?= $item->prix_u ?>FCFA</p>
                    </div>
                    <div class="feature-content d-flex align-items-center justify-content-between">
                        
                        <div class="feature-title col-12">
                            <h5><?= $item->nom_produit ?></h5>
                            <p>Publié le <?= $item->Date ?></p>
                            <p><b>Vendeur: </b><?= $item->vendeur ?></p>
                            <br>
                            <a class="btn btn-outline-success article-btn btn-block" onclick="$('#detail_<?= $item->idproduit ?>').fadeToggle('normal')"><i class="fa fa-plus pr-2" aria-hidden="true" id="btndetail"> Détails </i></a>
                            <div id="detail_<?= $item->idproduit ?>">
                                <p><b>Quantité disponible: <?= $item->qte_produit ?></b></p>
                                <br>
                                <p class="col-12" align="justify"><?= $item->details_produit ?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function(){
                    $('#detail_<?= $item->idproduit ?>').hide();
                    // $('#btndetail').click(function(){  
                    //     $('#detail_<?= $item->idproduit ?>').fadeToggle();
                    // });    
                });  
            </script>
        <?php } ?>
            <div class="col-sm-12 col-lg-3 col-md-4">
                <div class="single-features-area p-0">
                    <img src="<?= assets_url('img/bg-img/feature-1.jpg') ?>" alt="" style="width: 100%">
                    <!-- Price -->
                    <div class="price-start">
                        <p>650FCFA / tête</p>
                    </div>
                    <div class="feature-content d-flex align-items-center justify-content-between">
                        <div class="feature-title col-12">
                            <h5>Poulets d'un jour</h5>
                            <p>Publié le 12/06/2019</p>
                            <p><b>Vendeur: </b>Ferme avicole du centre de la ville</p>
                            <br>
                            <a class="btn btn-outline-success article-btn btn-block"><i class="fa fa-plus pr-2" aria-hidden="true"></i> Détails</a>
                        </div>
                     
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-4">
                <div class="single-features-area p-0">
                    <img src="<?= assets_url('img/bg-img/feature-1.jpg') ?>" alt="" style="width: 100%">
                    <!-- Price -->
                    <div class="price-start">
                        <p>650FCFA / tête</p>
                    </div>
                    <div class="feature-content d-flex align-items-center justify-content-between">
                        <div class="feature-title col-12">
                            <h5>Poulets d'un jour</h5>
                            <p>Publié le 12/06/2019</p>
                            <p><b>Vendeur: </b>Ferme avicole du centre de la ville</p>
                            <br>
                            <a class="btn btn-outline-success article-btn btn-block"><i class="fa fa-plus pr-2" aria-hidden="true"></i> Détails</a>
                        </div>
                     
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-4">
                <div class="single-features-area p-0">
                    <img src="<?= assets_url('img/bg-img/feature-1.jpg') ?>" alt="" style="width: 100%">
                    <!-- Price -->
                    <div class="price-start">
                        <p>650FCFA / tête</p>
                    </div>
                    <div class="feature-content d-flex align-items-center justify-content-between">
                        <div class="feature-title col-12">
                            <h5>Poulets d'un jour</h5>
                            <p>Publié le 12/06/2019</p>
                            <p><b>Vendeur: </b>Ferme avicole du centre de la ville</p>
                            <br>
                            <a class="btn btn-outline-success article-btn btn-block"><i class="fa fa-plus pr-2" aria-hidden="true"></i> Détails</a>
                        </div>
                     
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-4">
                <div class="single-features-area p-0">
                    <img src="<?= assets_url('img/bg-img/feature-1.jpg') ?>" alt="" style="width: 100%">
                    <!-- Price -->
                    <div class="price-start">
                        <p>650FCFA / tête</p>
                    </div>
                    <div class="feature-content d-flex align-items-center justify-content-between">
                        <div class="feature-title col-12">
                            <h5>Poulets d'un jour</h5>
                            <p>Publié le 12/06/2019</p>
                            <p><b>Vendeur: </b>Ferme avicole du centre de la ville</p>
                            <br>
                            <a class="btn btn-outline-success article-btn btn-block"><i class="fa fa-plus pr-2" aria-hidden="true"></i> Détails</a>
                        </div>
                     
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-4">
                <div class="single-features-area p-0">
                    <img src="<?= assets_url('img/bg-img/feature-1.jpg') ?>" alt="" style="width: 100%">
                    <!-- Price -->
                    <div class="price-start">
                        <p>650FCFA / tête</p>
                    </div>
                    <div class="feature-content d-flex align-items-center justify-content-between">
                        <div class="feature-title col-12">
                            <h5>Poulets d'un jour</h5>
                            <p>Publié le 12/06/2019</p>
                            <p><b>Vendeur: </b>Ferme avicole du centre de la ville</p>
                            <br>
                            <a class="btn btn-outline-success article-btn btn-block"><i class="fa fa-plus pr-2" aria-hidden="true"></i> Détails</a>
                        </div>
                     
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-4">
                <div class="single-features-area p-0">
                    <img src="<?= assets_url('img/bg-img/feature-1.jpg') ?>" alt="" style="width: 100%">
                    <!-- Price -->
                    <div class="price-start">
                        <p>650FCFA / tête</p>
                    </div>
                    <div class="feature-content d-flex align-items-center justify-content-between">
                        <div class="feature-title col-12">
                            <h5>Poulets d'un jour</h5>
                            <p>Publié le 12/06/2019</p>
                            <p><b>Vendeur: </b>Ferme avicole du centre de la ville</p>
                            <br>
                            <a class="btn btn-outline-success article-btn btn-block"><i class="fa fa-plus pr-2" aria-hidden="true"></i> Détails</a>
                        </div>
                     
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-4">
                <div class="single-features-area p-0">
                    <img src="<?= assets_url('img/bg-img/feature-1.jpg') ?>" alt="" style="width: 100%">
                    <!-- Price -->
                    <div class="price-start">
                        <p>650FCFA / tête</p>
                    </div>
                    <div class="feature-content d-flex align-items-center justify-content-between">
                        <div class="feature-title col-12">
                            <h5>Poulets d'un jour</h5>
                            <p>Publié le 12/06/2019</p>
                            <p><b>Vendeur: </b>Ferme avicole du centre de la ville</p>
                            <br>
                            <a class="btn btn-outline-success article-btn btn-block"><i class="fa fa-plus pr-2" aria-hidden="true"></i> Détails</a>
                        </div>
                     
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-4">
                <div class="single-features-area p-0">
                    <img src="<?= assets_url('img/bg-img/feature-1.jpg') ?>" alt="" style="width: 100%">
                    <!-- Price -->
                    <div class="price-start">
                        <p>650FCFA / tête</p>
                    </div>
                    <div class="feature-content d-flex align-items-center justify-content-between">
                        <div class="feature-title col-12">
                            <h5>Poulets d'un jour</h5>
                            <p>Publié le 12/06/2019</p>
                            <p><b>Vendeur: </b>Ferme avicole du centre de la ville</p>
                            <br>
                            <a class="btn btn-outline-success article-btn btn-block"><i class="fa fa-plus pr-2" aria-hidden="true"></i> Détails</a>
                        </div>
                     
                    </div>
                </div>
            </div>
            <div class="col-12">
                <a class="btn btn-success article-btn pull-right"><i class="fa fa-plus pr-2" aria-hidden="true"></i> Afficher plus de publications</a>
            </div>
          </div>
        </div>
    </section>
    <!-- ***** Features Destinations Area End ***** -->