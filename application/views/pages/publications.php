<!-- ***** Breadcumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image:url(<?= assets_url('img/bg-img/hero-1.jpg') ?>)">
</div>
<!-- ***** Breadcumb Area End ***** -->

<!-- ***** Features Destinations Area Start ***** -->
<section class="dorne-features-destinations-area pb-4">
    <div class="row">
        <!-- div class="col-12">
            <div class="section-heading mb-2 dark text-center">
                <span></span>
                <h4>Publications récentes</h4>
                <p>Retrouvez tous les offres aux meilleurs prix</p>
            </div>
        </div -->

        <div class="col-12">
            <div class="hero-search-form mt-0">


                <!-- Tabs Content -->

                <div class="filtre">
                    <form action="#" method="get">
                        <input type="text" name="name" class="form-control mr-2" placeholder="Entrez vos élements de recherche">
                        <button type="submit" class="btn btn-outline-success"><i class="fa fa-search pr-2" aria-hidden="true"></i> Chercher</button>
                    </form>
                    <form action="#" class="col-8" method="get">
                        <h5 class="m-2 pt-1">Trier  </h5>
                        <select class="form-control m-2">
                            <option selected>All Catagories</option>
                            <option value="1">Catagories 1</option>
                            <option value="2">Catagories 2</option>
                            <option value="3">Catagories 3</option>
                            <option value="3">Catagories 3</option>
                            <option value="3">Catagories 3</option>
                            <option value="3">Catagories 3</option>
                        </select>
                        <select class="form-control m-2">
                            <option selected>Price Range</option>
                            <option value="1">$100 - $499</option>
                            <option value="2">$500 - $999</option>
                            <option value="3">$1000 - $4999</option>
                        </select>
                    </form>
                </div>

            </div>
        </div>
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
    </div>
    </div>
</section>
<!-- ***** Features Destinations Area End ***** -->
