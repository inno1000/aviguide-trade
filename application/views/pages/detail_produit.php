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

        <?php if (!empty($item)) { ?>
            <div class="row col-12">
                <div class="col-lg-8 col-md-8 col-sm-12 m-auto">
                    <div class="contact-form" style="min-height: 400px;">
                        <div class="contact-form-title">
                            <h3 class="text-uppercase bold"><?= $item->nom_produit ?> (<?= $item->type ?>)</h3>
                            <img src="<?= assets_url("img/Produits/")."/".$item->img_produit ?>" class="pull-left mr-2" style="height: 300px; width: 300px">
                            <h5 class="text-uppercase">Prix Unitaire: <?= $item->prix_u ?> Fcfa</h5>
                            <h5 class="text-uppercase">Quantité : <?= $item->qte_produit ?> Unités</h5>
                            <span class="mt-4"><?= $item->details_produit ?></span>
                            <p>Publié le <?= moment($item->Date)->format('d-M-y à H:i') ?></p>
                        </div>

                    </div>
                </div>
                <div class="col-sm-12  m-auto col-lg-4 col-md-4">
                    <div class="contact-form" style="min-height: 400px;">
                        <div class="contact-form-title">
                            <h6 class="text-uppercase text-center">Informations sur le vendeur</h6>
                            <h5 class="text-success"><?= $item->vendeur ?></h5>
                            <label class=""><b>Télephone: </b><?= $item->telephone ?></label><br>
                            <label class="pt-1"><b>Email: </b><?= $item->email ?></label><br>
                            <label class="pt-1"><b>Adresse: </b>Dang</label><br>
                            <label class="pt-1"><b>Ville: </b>Ngaoundéré</label><br>
                            <label class="pt-1"><b>Pays: </b> Cameroun</label><br>
                            <label><b>Activité: </b>Vente d'aliments composés pour volaille</label>
                        </div>

                    </div>
                </div>

            </div>

        <?php } ?>
</section>
<!-- ***** Features Destinations Area End ***** -->
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
                    <div class="single-features-area p-0" style="background-image: url(<?= assets_url("img/Produits/")."/".$item->img_produit ?>); background-size: cover;">
                        <!--img src="<?= assets_url("img/Produits/")."/".$item->img_produit ?>" alt="" style="border-radius: 30px 30px 0px 0px; height: 200px; width: 100%" -->                <!-- Price -->
                        <div class="price-start">
                            <p><?= $item->prix_u ?>FCFA</p>
                        </div>
                        <div class="feature-content align-items-center justify-content-between">

                            <div class="feature-title pt-2 col-12">
                                <h6 class="text-white"><?= $item->nom_produit ?></h6>
                                <p class="text-white">Publié le <?= moment($item->Date)->format('d-M-y à H:i') ?></p>
                                <p class="text-white"><b>Quantité : </b><?= $item->qte_produit ?></p>
                                <p class="text-white"><b>Vendeur : </b><?= $item->vendeur ?></p>
                                <br>
                                <a href="<?= site_url("produit/detail_produit/$item->idproduit") ?>" target="_blank" class="btn btn-success btn-block"><i class="fa fa-plus pr-2" aria-hidden="true"></i> Détails</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="col-12">
                <a href="<?= site_url("publications") ?>" class="btn btn-success article-btn pull-right"><i class="fa fa-plus pr-2" aria-hidden="true"></i> Afficher plus de publications</a>
            </div>
        </div>
    </div>
</section>
<!-- ***** Features Destinations Area End ***** -->