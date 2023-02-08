<?php include_once "user.php" ; ?>
<nav class="d-flex justify-content-center">


    <?php foreach ($collections as $label):?>
    <div class="">

        <a  class="btn btn-primary p-2 <?= $label["nomAlb"] == $collection_name && isset($_SESSION["username"]) ? "mr-0 mt-4 mb-4 ml-4":"m-4"?>"
            href="<?= router\url("album","display", [$label["idAlb"]]) ?>"><?= $label["nomAlb"] ?>
            <?php if($label["nomAlb"] == $collection_name && isset($_SESSION["username"])): ?>
                <a href="<?= router\url("album","supprimerAlbum", [$label["idAlb"]]) ?>" class="btn btn-danger m-0 p-2">X</a>
            <?php endif; ?>
        </a>

        </div>
    <?php endforeach; ?>
    <?php if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION["username"])): ?>
        <a type="button" class="btn btn-success p-2 m-4" href="<?= router\url("album","add_album_display", [$label["idAlb"]]) ?>">Ajouter album</a>
    <?php endif; ?>
    <?php if(isset($_SESSION["username"])): ?>
        <div class="d-flex justify-content-center">
            <a class="btn btn-success p-2 m-4" href="<?= router\url("photo", "add_photo") ?>">Ajouter une photo</a>
        </div>
    <?php endif; ?>


</nav>