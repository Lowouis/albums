<?php include_once 'includable/header.php'; ?>





<div class="d-flex justify-content-center">


    <form action="<?= router\url("user","registred") ?>" method="post" class="col-md-4">
        <?php if(isset($_SESSION["error"])): ?>
            <div role="alert" class="alert alert-danger form-group m-1">
                <p class="text-align m-auto"><?= $_SESSION["error"] ?></p>
            </div>
        <?php endif; unset($_SESSION["error"]); ?>

        <div class="form-group m-1">
            <label for="exampleInputEmail1">Nom d'utilisateur</label>
            <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre nom d'utilisateur">
        </div>
        <div class="form-group m-1">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Entrez votre mot de passe">
        </div>
        <div class="form-group m-1">
            <label for="exampleInputPassword1">Confirmer mot de passe</label>
            <input name="password_confirm" type="password" class="form-control" id="exampleInputPassword1" placeholder="Entrez votre mot de passe">
        </div>
        <div class="m-1">
        <button type="submit" class="btn btn-primary">Créer</button>
        <a href="<?= router\url("user","login") ?>" class="btn btn-success">Connexion</a>
        </div>
    </form>
</div>

<?php include_once 'includable/footer.php';?>