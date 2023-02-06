<div class="d-flex justify-content-center">
    <?php if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION["username"])): ?>
        <h4 class="m-2"><?= $_SESSION["username"] ?> is connected</h4>
        <a href="<?= router\url("user","logout") ?>" class="btn btn-danger m-2">Logout</a>
    <?php else: ?>
        <div class="form-group mb-2 ">
            <label><small>You are not connected</small></label>
            <a class="btn btn-success" href="<?= router\url("user","login") ?>">login</a>
            <a class="btn btn-primary" href="<?= router\url("user","register") ?>">register</a>
        </div>

    <?php endif; ?>
</div>

<nav class="d-flex justify-content-center">


    <?php foreach ($collections as $label):?>
    <div class="">
        <a  class="btn btn-primary p-1 m-1"
            href="<?= router\url("album","display", [$label["idAlb"]]) ?>"><?= $label["nomAlb"] ?></a>

        </div>
    <?php endforeach; ?>
    <button type="button" class="btn btn-primary p-1 m-1" data-toggle="modal" data-target="#exampleModalCenter">Ajouter album</button>


</nav>