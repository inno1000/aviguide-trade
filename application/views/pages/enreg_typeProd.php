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
                   <h6>Enregistrez un type de produit ici...</h6>
               </div>
               <form action="<?php echo site_url('produit/save_typeProduit')?>" method="post" enctype="multipart/form-data" role="form">
                <!-- "<?php base_url()?>produit/save_produit" -->
                   <div class="row">
                       <div class="col-12">
                           <input type="text" name="nom_typeProd" class="form-control" placeholder="Désignation du type">
                           <?php echo form_error('nom_typeProd') ?>
                       </div>
                       <div class="col-12">
                           <button type="submit" class="btn dorne-btn" name="save">Enregistrer</button><input type="text" value="1" name="vendeur" hidden="true">
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