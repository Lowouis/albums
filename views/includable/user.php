<div class="d-flex justify-content-center">
    <?php if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION["username"])): ?>
        <h4 class="m-2"><small class="text-success"><?= $_SESSION["username"] ?></small> is connected</h4>
        <a href="<?= router\url("user","logout") ?>" class="btn btn-danger m-2"><span class="material-symbols-rounded">logout</span></a>
    <?php else: ?>
        <div class="form-group mb-2 ">
            <label><small>You are not connected</small></label>
            <a class="btn btn-success" href="<?= router\url("user","login") ?>">Login</a>
            <a class="btn btn-primary" href="<?= router\url("user","register") ?>">Register</a>
        </div>
    <?php endif; ?>
</div>
