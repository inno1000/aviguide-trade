<!-- ***** Breadcumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image:url(<?= assets_url('img/bg-img/hero-1.jpg') ?>)"></div>
<!-- ***** Breadcumb Area End ***** -->

<!-- ***** Contact Area Start ***** -->
<section class="dorne-features-destinations-area pt-0 pb-4">
   <div class="col-12 row">
       <div class="col-lg-4 col-md-4 col-sm-12 m-auto">
               <img src="<?php echo assets_url('img/core-img/favicon.png') ?>" width="500" alt="">
           </div>
       <!-- Map Area -->
       <div class="col-lg-8 col-md-8 col-sm-12 m-auto">
       <div class="contact-form">
               <div class="contact-form-title">
                   <h6>Connectez-vous</h6>
               </div>
               <form action="" method="post">
                   <div class="row">
                       <div class="col-12">
                           <input type="text" required name="email" value="<?php echo set_value('email') ?>" class="form-control" placeholder="Votre adresse email">
                           <?php echo form_error('email') ?>
                       </div>
                       <div class="col-12">
                           <input type="password" required name="password" value="<?php echo set_value('password') ?>" class="form-control" placeholder="Mot de passe">
                           <?php echo form_error('password') ?>
                       </div>
                       <div class="col-12">
                           <button type="submit" name="connecter" class="btn dorne-btn">Connecter</button>
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