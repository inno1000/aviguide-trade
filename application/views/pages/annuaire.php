<!-- ***** Breadcumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image:url(<?= assets_url('img/bg-img/hero-1.jpg') ?>)"></div>
<!-- ***** Breadcumb Area End ***** -->
<!-- ***** Features Destinations Area Start ***** -->
<section class="dorne-features-destinations-area pb-4">
    <div class="row">
        <div class="col-12">
            <div class="section-heading mb-2 dark text-center">
                <span></span>
                <h4>Rechercher des contacts</h4>
                <p>Retrouvez des personnes en fonction de vos besoins</p>
            </div>
        </div>
<!---->
<!--        <div class="col-12">-->
<!--            <div class="hero-search-form mt-0">-->


                <!-- Tabs Content -->

<!--                <div class="filtre">-->
<!--                    <form action="#" method="get">-->
<!--                        <h4>Trier par  </h4>-->
<!--                        <select class="custom-select ml-2">-->
<!--                            <option selected>All Catagories</option>-->
<!--                            <option value="1">Catagories 1</option>-->
<!--                            <option value="2">Catagories 2</option>-->
<!--                            <option value="3">Catagories 3</option>-->
<!--                            <option value="3">Catagories 3</option>-->
<!--                            <option value="3">Catagories 3</option>-->
<!--                            <option value="3">Catagories 3</option>-->
<!--                        </select>-->
<!--                        <select class="custom-select">-->
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
                    <th style="width: 25%"></th>
                    <th style="width: 25%"></th>
                    <th style="width: 25%"></th>
                </tr>
                </thead>
                <tbody>

                <?php
                $i = 1;
                foreach ($contact as $item) {
                    echo $i ==1?" <tr><td>":"<td>";
                    ?>
                    <div class="col-sm-12">
                        <div class=" p-2 contact">
                            <!-- Price -->

                            <h6 class="text-center text-success p-2"><?= $item->prenom ?> <?= $item->nom ?></h6>
                            <div class="pl-4">
                                <span class="pt-2"><b>Télephone: </b><?= $item->telephone ?></span><br>
                                <span class="pt-2"><b>Fax: </b><?= $item->fax ?></span><br>
                                <span class="pt-2"><b>Email: </b><?= $item->email ?></span><br>
                                <span class="pt-2"><b>Site web: </b><?= $item->site_web ?></span><br>
                                <span class="pt-2"><b>Adresse: </b><?= $item->Adresse ?></span><br>
                                <span><b>Activité: </b><?= $item->Activites ?></span>
                            </div>

                        </div>
                    </div>
                    <?php
                    echo $i < 4?"</td>":" </td></tr>";
                    $i < 4?$i++:$i = 1;
                }

                while ($i<=4){
                    echo $i < 4?"<td></td>":" <td></td></tr>";
                    $i++;
                }

                ?>
                </tbody>
            </table>

        </div>

<!--        <div class="col-sm-12 col-lg-3 col-md-4">-->
<!--            <div class=" p-2 contact">-->
<!--                    <h6 class="text-center text-success p-2">Ferme avicole du centre de la ville</h6>-->
<!--                           <div class="pl-4">-->
<!--                               <span class="pt-2"><b>Télephone: </b>+237 699 994 570</span><br>-->
<!--                               <span class="pt-4"><b>Fax: </b>+237 699 994 570</span><br>-->
<!--                               <span class="pt-2"><b>Email: </b>batourimaidadi@gmail.com</span><br>-->
<!--                               <span class="pt-2"><b>Site web: </b>batourimaidadi@gmail.com</span><br>-->
<!--                               <span class="pt-2"><b>Adresse: </b>Dang, Ngaoundéré, Cameroun</span><br>-->
<!--                               <span><b>Activité: </b>Vente d'aliments composés pour volaille</span>-->
<!--                           </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
    </div>
</section>
<!-- ***** Features Destinations Area End ***** -->