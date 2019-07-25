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
                                    <input type="text" name="name" class="form-control m-1" placeholder="Entrez les élements de recherche...">
                                    <select class="custom-select m-1">
                                        <option selected>All Catagories</option>
                                        <option value="1">Catagories 1</option>
                                        <option value="2">Catagories 2</option>
                                        <option value="3">Catagories 3</option>
                                    </select>
                                    <select class="custom-select m-1">
                                        <option selected>Price Range</option>
                                        <option value="1">$100 - $499</option>
                                        <option value="2">$500 - $999</option>
                                        <option value="3">$1000 - $4999</option>
                                    </select>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-search pr-2" aria-hidden="true"></i> Chercher</button>
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
                          <img src="<?= assets_url("img/Produits/")."/".$item->img_produit ?>" alt="" style="height: 200px; width: 100%">                <!-- Price -->
                          <div class="price-start">
                              <p><?= $item->prix_u ?>FCFA</p>
                          </div>
                          <div class="feature-content d-flex align-items-center justify-content-between">

                              <div class="feature-title col-12">
                                  <h6><?= $item->nom_produit ?></h6>
                                  <p>Publié le <?= moment($item->Date)->format('d-M-y à H:i') ?></p>
                                  <p><b>Quantité : </b><?= $item->qte_produit ?></p>
                                  <p><b>Vendeur : </b><?= $item->vendeur ?></p>
                                  <br>
                                  <a href="<?= site_url("produit/detail_produit/$item->idproduit") ?>" target="_blank" class="btn btn-outline-success article-btn btn-block"><i class="fa fa-plus pr-2" aria-hidden="true"></i> Détails</a>
                              </div>
                          </div>
                      </div>
                  </div>
              <?php } ?>

            <div class="col-12">
                <a href="<?= site_url("produit/publications") ?>" class="btn btn-success article-btn pull-right"><i class="fa fa-plus pr-2" aria-hidden="true"></i> Afficher plus de publications</a>
            </div>
          </div>
        </div>
    </section>
    <!-- ***** Features Destinations Area End ***** -->