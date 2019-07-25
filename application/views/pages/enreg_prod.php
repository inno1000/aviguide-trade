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
           <!-- div class="col-12">
               <a href="<?php echo site_url('produit/save_typeProduit')?>" class="btn btn-success article-btn pull-right"><i class="fa fa-plus pr-2" aria-hidden="true"></i> Ajouter un type de produit</a>
           </div -->
           <div class="contact-form">
               <div class="contact-form-title">
                   <h6>Enregistrez un produit ici...</h6>
               </div>
               <form action="<?php echo site_url('produit/save_produit')?>" method="post" enctype="multipart/form-data" role="form">
                <!-- "<?php base_url()?>produit/save_produit" -->
                   <div class="row">
                       <div class="col-12 col-md-6">
                           <input type="text"  name="nom_prod" class="form-control" placeholder="Nom du produit">
                           <?php echo form_error('nom_prod') ?>
                       </div>
                       <div class="col-12 col-md-6">
                          <select class="form-control" name="type_prod">
                              <option selected disabled value="">Sélectionnez le type de produit</option>
                                <?php foreach ($type_produit as $item){ ?>
                                      <option value="<?= $item->idtype_produit ?>" <?= set_select('type_prod', $item->idtype_produit) ?>><?= $item->nom ?></option>
                                <?php } ?>
                          </select>
                          <?php echo form_error('type_prod')?>
                         </div>
                       <div class="col-12 col-md-6">
                           <input type="number"  name="pu_prod" class="form-control" placeholder="Prix unitaire du produit en FCFA">
                           <?php echo form_error('pu_prod') ?>
                       </div>
                       <div class="col-12 col-md-6">
                           <input type="number"  name="qte_prod" class="form-control" placeholder="Quantité">
                           <?php echo form_error('qte_prod') ?>
                       </div>
                       <div class="col-12 col-md-6">
                           <input type="file" accept="image/*" name="tof_prod" class="form-control" value="1" id="tof" onchange="preview_image(event)">
                           <?php echo form_error('tof_prod') ?>
                       </div>
                       <div class="col-12 col-md-6">
                           <img id="output_image" width="60px" height="200px">
                       </div>
                       <div class="col-12">
                           <textarea name="details_prod" class="form-control" id="Message" cols="30" rows="10" placeholder="Quelques détails sur votre produit...."></textarea>
                           <?php echo form_error('details_Prod') ?>
                       </div>
                       <div class="col-12">
                           <button type="submit" class="btn btn-outline-success" name="save">Enregistrer</button><input type="text" value="1" name="vendeur" hidden="true">
                       </div>
                   </div>
               </form>
           </div>
       </div>
   </div>
</section>
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