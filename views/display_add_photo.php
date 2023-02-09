<?php
session_start();
include_once 'includable/header.php';
include_once "includable/user.php";
?>

<div class="col-md-4 mx-auto">
    <?php if(isset($_SESSION["error"])): ?>
        <div role="alert" class="alert alert-danger form-group m-1 d-flex justify-content-center ">
            <p class="m-auto"><?= $_SESSION["error"] ?></p>
        </div>
    <?php endif; unset($_SESSION["error"])?>
    <form class="form-label" action="<?= router\url("photo", "submit_photo") ?>" method="POST" enctype="multipart/form-data">
        <div class="m-2">
            <div class="">
                <h5 class="p-0">Choisissez un fichier</h5>
                <input type="file" class="" id="fileToUpload" name="submitted_photo" lang="fr">
            </div>
        </div>
            <div class="m-2 row">
                <h5 class="p-0">Choisissez un album </h5>
                <?php foreach ($albums as $album): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?= $album["nomAlb"] ?>" id="<?= $album["nomAlb"] ?>" name="album[]">
                        <label class="form-check-label" for="<?= $album["nomAlb"] ?>"><?= $album["nomAlb"] ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
        <div class="d-flex w-100">
            <input type="submit" value="Ajouter" class="btn my-2 m-2 btn-primary d-flex justify-content-center w-100">
        </div>
    </form>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-2 m-2 btn-success d-flex justify-content-center w-25" href="<?= router\url("album", "display") ?>">Retour</a>
</div>

<?php include_once 'includable/footer.php';?>