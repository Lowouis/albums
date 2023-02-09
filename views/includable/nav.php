<?php include_once "user.php" ; ?>
<nav class="d-flex justify-content-center">


    <?php foreach ($collections as $label):?>
    <div class="">

        <a  class="btn btn-primary p-2 <?= $label["nomAlb"] == $collection_name && isset($_SESSION["username"]) ? "mr-0 mt-4 mb-4 ml-4":"m-4"?>"
            href="<?= router\url("album","display", [$label["idAlb"]]) ?>"><?= $label["nomAlb"] ?>
            <?php if($label["nomAlb"] == $collection_name && isset($_SESSION["username"])): ?>
                <a href="<?= router\url("album","confirm_delete_album", [$label["idAlb"]]) ?>" class="btn btn-danger m-0 p-2">X</a>
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

<?php if(isset($_SESSION["success"])): ?>
    <div role="alert" class="alert alert-success form-group m-1 d-flex justify-content-center ">
        <p class="m-auto"><?= $_SESSION["success"] ?></p>
    </div>
<?php endif; unset($_SESSION["success"]) ?>

<?php if(isset($_SESSION["confirm_delete_album"])): ?>
    <div role="alert" class="alert alert-danger form-group m-1 d-flex justify-content-center ">
        <p class="d-flex align-self-center">Êtes-vous sur de vouloir supprimer l'album <strong><?= $_SESSION["confirm_delete_album"]["nomAlb"] ?></strong></p>
        <a href="<?= router\url("album","delete_album", [$_SESSION["confirm_delete_album"]["idAlb"]]) ?>" class="btn btn-danger m-1 p-2">Oui</a>
        <a href="<?= router\url("album","display", [$_SESSION["confirm_delete_album"]["idAlb"]]) ?>" class="btn btn-success m-1 p-2">Non</a>
    </div>
<?php endif; unset($_SESSION["confirm_delete_album"]) ?>

<?php if(isset($_SESSION["confirm_delete_photo"])): ?>
    <div role="alert" class="alert alert-danger form-group m-1 d-flex justify-content-center ">
        <p class="d-flex align-self-center">Êtes-vous sur de vouloir supprimer cette photo</p>
        <a href="<?= router\url("photo","delete", [$_SESSION["confirm_delete_photo"]]) ?>" class="btn btn-danger m-1 p-2">Oui</a>
        <a href="<?= router\url("album","display") ?>" class="btn btn-success m-1 p-2">Non</a>
    </div>
<?php endif; unset($_SESSION["confirm_delete_photo"]) ?>
