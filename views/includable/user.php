<div class="d-flex justify-content-center">
    <?php if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION["username"])): ?>
        <h4 class="m-2 align-middle "><bold class="text-success"><?= ucfirst($_SESSION["username"]). " "?></bold>est connecté</h4>
        <a href="<?= router\url("user","logout") ?>" class="btn btn-danger m-2"><span class="material-symbols-rounded">logout</span></a>
    <?php else: ?>
        <div class="form-group mb-2">
            <a class="btn btn-success m-2 p-3" href="<?= router\url("user","login") ?>">Connexion</a>
            <a class="btn btn-primary m-2 p-3" href="<?= router\url("user","register") ?>">S'enregister</a>
        </div>
    <?php endif; ?>
</div>
