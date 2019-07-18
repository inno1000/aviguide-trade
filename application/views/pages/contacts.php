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
<script type="text/javascript">
    $(document).ready(function(){
        <?php if($val = get_flash_data()){
        echo 'setTimeout(function(){
                    alertify.'.$val[0].'("'.$val[1].'");
                }, 750);';
        } ?>
    });
</script>