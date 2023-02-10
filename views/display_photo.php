<?php
session_start();
include_once 'includable/header.php';
include_once "includable/user.php";
include_once "includable/alert.php"
?>



    <div class="col-md-4 mx-auto">
        <img class="card-img-top" src="<?= router\web('data/', $photo)?>">
        <?php if(isset($_SESSION["username"]) && isset($_SESSION["photo_edit"]) && $_SESSION["photo_edit"]): ?>
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
                                                <?= $ab["idAlb"]==$album["idAlb"] ? "checked" : "" ?>
                                            <?php endforeach; echo $album["idAlb"];?>
                                                class="form-check-input" type="checkbox" value="<?= $album["idAlb"] ?>" id="<?= $album["nomAlb"] ?>" name="album[]">
                                        <label class="form-check-label" for="<?= $album["nomAlb"] ?>"><?= $album["nomAlb"] ?></label>
                                    </div>
                                <?php endforeach; ?><input class="btn mt-2 btn-primary w-100" type="submit" value="Mettre à jour">
                            </form>
                        </div>
                    </fieldset>
                </div>
            </div>
        <?php endif ; ?>
    </div>
    <div class="d-flex justify-content-center">
        <a class="btn my-2 m-2 btn-success d-flex justify-content-center w-25" href="<?= router\url("album", "display", [$_SESSION["selected_album"]]) ?>">Retour</a>
    </div>

<?php include_once 'includable/footer.php';?>