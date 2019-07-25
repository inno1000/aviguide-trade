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
    </div>
    </div>
</section>
<!-- ***** Features Destinations Area End ***** -->
