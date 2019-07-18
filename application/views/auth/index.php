<div class="row py-2">
    <div class="col-3"></div>
    <div class="col-6 py-4">
        <form action="" method="post">
            <?php if(isset($error) && is_array($error)) { ?>
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Erreur</h4>
                    <?php foreach($error as $e){ ?>
                        <p><?= $e ?></p>
                    <?php } ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" class="form-control" name="login" id="login" aria-describedby="loginHelp" placeholder="Entrez votre login">
                <small id="loginHelp" class="form-text text-muted">Ex: arthur</small><?= form_error('login') ?>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="passwordHelp" placeholder="Entrz votre mot de passe">
                <small id="passwordHelp" class="form-text text-muted">Ex: arthur01</small><?= form_error('password') ?>
            </div>
            <button type="submit" class="btn btn-primary right">Se connecter</button>
        </form>
    </div>
</div>