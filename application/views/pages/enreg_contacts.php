<!--h2><?php //echo $this->session->flashdata('success_msg'); ?></h2-->
<!-- ***** Breadcumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image:url(<?= assets_url('img/bg-img/hero-1.jpg') ?>)"></div>
<!-- ***** Breadcumb Area End ***** -->

<!-- ***** Contact Area Start ***** -->
<section class="dorne-features-destinations-area pb-4">
   <div class="col-12 row">
       <div class="col-lg-4 col-md-4 col-sm-12 m-auto">
           <img src="<?php echo assets_url('img/core-img/favicon.png') ?>" width="500" alt="">
       </div>
       <!-- Map Area -->
       <div class="col-lg-8 col-md-8 col-sm-12 m-auto">
           <div class="contact-form">
               <div class="contact-form-title">
                   <h6>Enregistrement des contacts...</h6>
               </div>
               <form action="<?php echo site_url('annuaire/save_contact')?>" method="post" enctype="multipart/form-data" role="form">
                <!-- "<?php base_url()?>produit/save_produit" -->
                   <div class="row">
                       <div class="col-12 col-md-12">
                           <input type="text"  name="nom_contact" class="form-control" placeholder="Nom de l'entreprise ou de la personne...">
                           <?php echo form_error('nom_contact') ?>
                       </div>
                       <div class="col-12 col-md-4">
                           <input type="tel"  name="tel_contact" class="form-control" placeholder="Numéro de téléphone" multiple>
                           <?php echo form_error('tel_contact') ?>
                       </div>
                       <div class="col-12 col-md-4">
                           <input type="tel"  name="fax_contact" class="form-control" placeholder="Numéro de Fax">
                           <?php echo form_error('fax_contact') ?>
                       </div>
                       <div class="col-12 col-md-4">
                           <input type="email"  name="email_contact" class="form-control" placeholder="Adresse mail" multiple>
                           <?php echo form_error('email_contact') ?>
                       </div>
                       <div class="col-12 col-md-6">
                           <input type="url"  name="site_contact" class="form-control" placeholder="Adresse de site internet...">
                           <?php echo form_error('site_contact') ?>
                       </div>
                       <div class="col-12 col-md-6">
                           <input type="text"  name="adresse_contact" class="form-control" placeholder="Adresse physique...">
                           <?php echo form_error('site_contact') ?>
                       </div>
                       <div class="col-12 col-md-12">
                           <textarea name="activite_contact" class="form-control" placeholder="Activités..."></textarea>
                           <?php echo form_error('activite_contact') ?>
                       </div>
                       <div class="col-12">
                           <button type="submit" class="btn btn-outline-success" name="save">Enregistrer</button>
                       </div>
                   </div>
               </form>
           </div>
       </div>
   </div>
</section>
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
<!-- ***** Contact Area End ***** -->
<script type="text/javascript">
    $(document).ready(function(){
        <?php if($val = get_flash_data()){
        echo 'setTimeout(function(){
                    alertify.'.$val[0].'("'.$val[1].'");
                }, 750);';
        } ?>
    });

  function preview_image(event) 
  {
   var reader = new FileReader();
   reader.onload = function()
   {
    var output = document.getElementById('output_image');
    output.src = reader.result;
   }
   reader.readAsDataURL(event.target.files[0]);
  }
</script>