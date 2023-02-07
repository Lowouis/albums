<?php
session_start();
include_once 'includable/header.php';
include_once "includable/user.php";
?>

<div class="col-md-4 mx-auto">
        <img class="card-img-top" src="<?= router\web('data/', $photo).".jpg" ?>">

    <div class="card-body d-flex align-items-end">
        <div class="absolute-bottom">
            <h5 class="card-title"><?= $photo ?></h5>
<!--            <?php /*if(isset($_SESSION["username"])): */?>
            <a  class="btn btn-success"><span class="material-symbols-outlined">edit</span></a>
            <a  class="btn btn-danger"><span class="material-symbols-outlined">delete</span></a>
            --><?php /*endif; */?>
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
                                    class="form-check-input" type="checkbox" value="<?= $album["nomAlb"] ?>" id="<?= $album["nomAlb"] ?>" name="album">
                            <label class="form-check-label" for="<?= $album["nomAlb"] ?>"><?= $album["nomAlb"] ?></label>
                        </div>
                    <?php endforeach; ?>
                        <input class="btn my-2 m-2 btn-primary w-100" name="album" type="submit" value="Update">
                    </form>
                </div>
            </fieldset>
        </div>

    </div>
</div>
    <div class="d-flex justify-content-center">
        <a class="btn my-2 m-2 btn-success d-flex justify-content-center w-25" href="<?= router\url("album", "display") ?>">Retour</a>
    </div>

<?php include_once 'includable/footer.php';?>