<?php
session_start();
include_once 'includable/header.php';
include_once "includable/user.php";
?>
<?php if(isset($_SESSION["success"])): ?>
    <div class="d-flex justify-content-center"><p class="text-success"><?= $_SESSION["success"] ?></p></div>
<?php endif ?>
<?php unset($_SESSION["success"]) ?>
<div class="col-md-4 mx-auto">
        <img class="card-img-top" src="<?= router\web('data/', $photo)?>">

    <div class="card-body d-flex align-items-end p-0">
        <div class="absolute-bottom">

            <fieldset>
                <div class="m-2 row">
                    <h5 class="p-0">Albums</h5>

                    <form action="<?= router\url("photo", "update_album") ?>" method="post">
                    <?php foreach ($albums as $album):?>
                        <div class="form-check">
                            <input
                        <?php foreach ($assoc_alb as $ab):?>
                            <?= $ab["nomAlb"]==$album["nomAlb"] ? "checked" : "" ?>
                        <?php endforeach; ?>
                                    class="form-check-input" type="checkbox" value="<?= $album["nomAlb"] ?>" id="<?= $album["nomAlb"] ?>" name="album[]">
                                    <label class="form-check-label" for="<?= $album["nomAlb"] ?>"><?= $album["nomAlb"] ?></label>
                        </div>
                    <?php endforeach; ?><input class="btn mt-2 btn-primary w-100" type="submit" value="Mettre à jour">
                    </form>
                </div>
            </fieldset>
        </div>


    </div>
    <?php if(isset($_SESSION["error"])):?>
        <div role="alert" class="alert alert-danger form-group m-auto d-flex justify-content-center">
            <p class="m-auto"><?= $_SESSION["error"] ?></p>
        </div>

    <?php endif;unset($_SESSION["error"]); ?>
</div>
    <div class="d-flex justify-content-center">
        <a class="btn my-2 m-2 btn-success d-flex justify-content-center w-25" href="<?= router\url("album", "display") ?>">Retour</a>
    </div>

<?php include_once 'includable/footer.php';?>