<?php
session_start();
include_once 'includable/header.php';
include_once "includable/user.php";
?>

<div class="col-md-4 mx-auto">
    <form class="form-label" action="<?= router\url("photo", "submit_photo") ?>" method="POST" enctype="multipart/form-data">
        <div class="m-2">
            <h5 class="p-0">Choisisez un fichier</h5>
            <input class="" type="file" name="submitted_photo" id="fileToUpload">
        </div>
            <div class="m-2 row">
                <h5 class="p-0">Choisisez un album </h5>
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
    <?php if(isset($_SESSION["error"])): ?>
        <p class="text-danger"><?= $_SESSION["error"] ?></p>
    <?php endif ?>
    <?php unset($_SESSION["error"]) ?>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-2 m-2 btn-success d-flex justify-content-center w-25" href="<?= router\url("album", "display") ?>">Retour</a>
</div>

<?php include_once 'includable/footer.php';?>