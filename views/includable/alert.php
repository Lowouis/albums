<?php if(isset($_SESSION["success"])): ?>
    <div role="alert" class="alert alert-success form-group m-1 d-flex justify-content-center ">
        <p class="m-auto"><?= $_SESSION["success"] ?></p>
    </div>
<?php endif; unset($_SESSION["success"]) ?>

<?php if(isset($_SESSION["error"])): ?>
    <div role="alert" class="alert alert-danger form-group m-1">
        <p class="text-align m-auto"><?= $_SESSION["error"] ?></p>
    </div>
<?php endif; unset($_SESSION["error"]); ?>

<?php if(isset($_SESSION["confirm_delete_album"])): ?>
    <div role="alert" class="alert alert-danger form-group m-1 d-flex justify-content-center ">
        <p class="m-auto">Êtes-vous sur de vouloir supprimer l'album <strong><?= $_SESSION["confirm_delete_album"]["nomAlb"] ?></strong></p>
        <a href="<?= router\url("album","delete_album", [$_SESSION["confirm_delete_album"]["idAlb"]]) ?>" class="btn btn-danger m-1 p-2">Oui</a>
        <a href="<?= router\url("album","display", [$_SESSION["confirm_delete_album"]["idAlb"]]) ?>" class="btn btn-success m-1 p-2">Non</a>
    </div>
<?php endif; unset($_SESSION["confirm_delete_album"]) ?>

<?php if(isset($_SESSION["confirm_delete_photo"])): ?>
    <div role="alert" class="alert alert-danger form-group m-1 d-flex justify-content-center ">
        <p class="m-auto">Êtes-vous sur de vouloir supprimer cette photo</p>
        <a href="<?= router\url("photo","delete", [$_SESSION["confirm_delete_photo"]]) ?>" class="btn btn-danger m-1 p-2">Oui</a>
        <a href="<?= router\url("album","display") ?>" class="btn btn-success m-1 p-2">Non</a>
    </div>
<?php endif; unset($_SESSION["confirm_delete_photo"]) ?>

