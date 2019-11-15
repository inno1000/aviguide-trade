<!-- ***** Breadcumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image:url(<?= assets_url('img/bg-img/hero-1.jpg') ?>)"></div>
<!-- ***** Breadcumb Area End ***** -->

<!-- ***** Contact Area Start ***** -->
<section class="dorne-features-destinations-area pb-4">
   <div class="col-12 row">
       <!-- Contact Form Area -->
       <div class="col-6">
           <div class="contact-text">
               <h4>Salut entrez en contact avec nous</h4>
               <p>
                   Pour nous contacter veuillez remplir ce formulaire afin de nous faire part de vos préocupations,
                   vos suggessions ainsi que vos demandes vis a vis des services que nous vous offrons.
               </p>
               <br>
                   <span><i class="fa fa-map" aria-hidden="true"></i> Dang-Ngaoundéré, Cameroun</span><br>
                   <span><i class="fa fa-envelope-o" aria-hidden="true"></i> aviguideCameroun@gmail.com</span><br>
                   <span><i class="fa fa-phone" aria-hidden="true"></i> +237 695 956 707</span>

           </div>

       </div>
       <!-- Map Area -->
       <div class="col-6">
           <div class="contact-form">
               <div class="contact-form-title">
                   <h6>Contact Business</h6>
               </div>
               <form action="" method="post">
                   <div class="row">
                       <div class="col-12">
                           <input type="text" required name="nom" value="<?php echo set_value('nom') ?>" class="form-control" placeholder="Votre nom">
                           <?php echo form_error('nom') ?>
                       </div>
                       <div class="col-12 col-md-6">
                           <input type="text" required name="telephone" value="<?php echo set_value('telephone') ?>" class="form-control" placeholder="Numéro téléphone">
                           <?php echo form_error('telephone') ?>
                       </div>
                       <div class="col-12 col-md-6">
                           <input type="email" required name="email" value="<?php echo set_value('email') ?>" class="form-control" placeholder="Adresse Email">
                           <?php echo form_error('email') ?>
                       </div>
                       <div class="col-12">
                           <input type="text" required name="objet" value="<?php echo set_value('objet') ?>" class="form-control" placeholder="Objet">
                           <?php echo form_error('objet') ?>
                       </div>
                       <div class="col-12">
                           <textarea name="message" required class="form-control" id="Message" cols="30" rows="10" placeholder="Votre Message"><?php echo set_value('message') ?></textarea>
                           <?php echo form_error('message') ?>
                       </div>
                       <div class="col-12">
                           <button type="submit" class="btn dorne-btn">Envoyer</button>
                       </div>
                   </div>
               </form>
           </div>
       </div>
   </div>
</section>

<!-- ***** Contact Area End ***** -->
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
<script type="text/javascript">
    $(document).ready(function(){
        <?php if($val = get_flash_data()){
        echo 'setTimeout(function(){
                    alertify.'.$val[0].'("'.$val[1].'");
                }, 750);';
        } ?>
    });
</script>