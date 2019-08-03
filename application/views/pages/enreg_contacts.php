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