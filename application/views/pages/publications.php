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

<!--        <div class="col-12">-->
<!--            <div class="hero-search-form mt-0">-->
<!---->
<!---->
                    <!--Tabs Content -->
<!---->
<!--                <div class="filtre">-->
<!--                    <form action="#" method="get">-->
<!--                        <input type="text" name="name" class="form-control mr-2" placeholder="Entrez vos élements de recherche">-->
<!--                        <button type="submit" class="btn btn-outline-success"><i class="fa fa-search pr-2" aria-hidden="true"></i> Chercher</button>-->
<!--                    </form>-->
<!--                    <form action="#" class="col-8" method="get">-->
<!--                        <h5 class="m-2 pt-1">Trier  </h5>-->
<!--                        <select class="form-control m-2">-->
<!--                            <option selected>All Catagories</option>-->
<!--                            <option value="1">Catagories 1</option>-->
<!--                            <option value="2">Catagories 2</option>-->
<!--                            <option value="3">Catagories 3</option>-->
<!--                            <option value="3">Catagories 3</option>-->
<!--                            <option value="3">Catagories 3</option>-->
<!--                            <option value="3">Catagories 3</option>-->
<!--                        </select>-->
<!--                        <select class="form-control m-2">-->
<!--                            <option selected>Price Range</option>-->
<!--                            <option value="1">$100 - $499</option>-->
<!--                            <option value="2">$500 - $999</option>-->
<!--                            <option value="3">$1000 - $4999</option>-->
<!--                        </select>-->
<!--                    </form>-->
<!--                </div>-->
<!---->
<!--            </div>-->
<!--        </div>-->
        <div class="col-sm-12 table-responsive" id="table-content">
            <table class="table small" width="100%" id="dataTable" cellspacing="0">
                <thead>
                <tr>
                    <th>Produits publié recement</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                <?php
                $i = 1;
                foreach ($produits as $item) {
                    echo $i ==1?" <tr><td>":"<td>";
                    ?>
                    <div class="col-sm-12">
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
                <?php
                    echo $i < 4?"</td>":" </td></tr>";
                    $i < 4?$i++:$i = 1;
                } ?>
                </tbody>
            </table>

        </div>
    </div>
    </div>
</section>
<!-- ***** Features Destinations Area End ***** -->
