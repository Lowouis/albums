<?php include_once "user.php" ; ?>
<nav class="d-flex justify-content-center">


    <?php foreach ($collections as $label):?>
    <div class="">
        <a  class="btn btn-primary p-1 m-1"
            href="<?= router\url("album","display", [$label["idAlb"]]) ?>"><?= $label["nomAlb"] ?>
            <?php if($label["nomAlb"] == $collection_name && isset($_SESSION["username"])): ?>
                <a href="<?= router\url("album","supprimerAlbum", [$label["idAlb"]]) ?>" class="btn btn-danger p-1">X</a>
            <?php endif; ?>
        </a>

        </div>
    <?php endforeach; ?>
    <?php if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION["username"])): ?>
        <a type="button" class="btn btn-success p-1 m-1" href="<?= router\url("album","add_album_display", [$label["idAlb"]]) ?>">Ajouter album</a>
    <?php endif; ?>


</nav>