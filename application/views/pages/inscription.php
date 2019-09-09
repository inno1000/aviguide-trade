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
                   <h6>Inscrivez-vous ici pour faire partir de nos membres</h6>
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
                           <input type="email" required name="email" value="<?php echo set_value('email') ?>" class="form-control" placeholder="Email">
                           <?php echo form_error('email') ?>
                       </div>
                       <div class="col-12">
                           <select class="form-control">
                               <option selected>Sélectionnez votre pays</option>
                               <option value="1">Cameroun</option>
                               <option value="2">Benin</option>
                               <option value="3">Guinée</option>
                           </select>
                       </div>
                       <div class="col-12">
                           <input type="text" required name="ville" value="<?php echo set_value('ville') ?>" class="form-control" placeholder="ville">
                           <?php echo form_error('ville') ?>
                       </div>
                       <div class="col-12">
                           <textarea name="activite" required class="form-control" id="Message" cols="30" rows="10" placeholder="Insérez est votre activité"><?php echo set_value('message') ?></textarea>
                           <?php echo form_error('activite') ?>
                       </div>
                       <div class="col-12">
                           <button type="submit" class="btn dorne-btn">Enregistrer</button>
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
</script>