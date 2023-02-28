<div class="d-flex justify-content-center row">
    <?php if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION["username"])): ?>
        <h4 class="m-2 text-center "><bold class="text-success"><?= ucfirst($_SESSION["username"]). " "?></bold>est connecté</h4>
        <div class="d-flex justify-content-center">
        <a href="<?= router\url("album","display") ?>" class="btn btn-success m-2"><span class="material-symbols-rounded">home</span></a>
        <?php if(isset($_SESSION["access"]) && $_SESSION["access"] >= 2): ?>
            <a href="<?= router\url("user","manager") ?>" class="btn btn-primary m-2"><span class="material-symbols-outlined">manage_accounts</span></a>
            <a href="<?= router\url("logs","dashboard") ?>" class="btn btn-success m-2"><span class="material-symbols-outlined">sync_alt</span></a>

        <?php endif ?>
        <a href="<?= router\url("user","logout") ?>" class="btn btn-danger m-2"><span class="material-symbols-rounded">logout</span></a>

    <?php else: ?>
        <div class="d-flex justify-content-center form-group mb-2">
            <a class="btn btn-success m-2 p-3" href="<?= router\url("user","login") ?>">Connexion</a>
            <a class="btn btn-primary m-2 p-3" href="<?= router\url("user","register") ?>">S'enregister</a>
        </div>
    <?php endif; ?>
        </div>
</div>
