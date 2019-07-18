<div class="row">
    <form action="" method="post">
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">Inscription</h4>
                <p class="card-text">
                    <div class="form-group">
                      <label for="name">Nom:</label>
                      <input type="text" class="form-control" name="name" id="name" value="<?= set_value("name") ?>" placeholder="Entrez votre nom">
                    </div>
                    <div class="form-group">
                      <label for="surname">Prenom</label>
                      <input type="text" class="form-control" name="surname" id="surname" value="<?= set_value("surname") ?>" placeholder="Entrez votre prenom">
                    </div>
                    <div class="form-group">
                      <label for=""></label>
                      <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>
                </p>
            </div>
        </div>
    </form>
</div>