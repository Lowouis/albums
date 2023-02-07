<?php
session_start();
include_once 'includable/header.php';
include_once "includable/user.php";
?>

<div class="col-md-4 mx-auto">

    <form class="form-label" action="" method="post" enctype="multipart/form-data">
        <input class="btn" type="file" name="fileToUpload" id="fileToUpload">
    </form>

    <fieldset>
        <div class="m-2 row">
            <h5 class="p-0">Choisisez un album </h5>
            <?php foreach ($albums as $album): ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="<?= $album["nomAlb"] ?>" id="<?= $album["nomAlb"] ?>" name="album">
                    <label class="form-check-label" for="<?= $album["nomAlb"] ?>"><?= $album["nomAlb"] ?></label>
                </div>
            <?php endforeach; ?>
        </div>
    </fieldset>

<!--
    EXEMPLE A REPRENDRE

    <form action="checkbox-form.php" method="post">
        Which buildings do you want access to?<br />
        <input type="checkbox" name="formDoor[]" value="A" />Acorn Building<br />
        <input type="checkbox" name="formDoor[]" value="B" />Brown Hall<br />
        <input type="checkbox" name="formDoor[]" value="C" />Carnegie Complex<br />
        <input type="checkbox" name="formDoor[]" value="D" />Drake Commons<br />
        <input type="checkbox" name="formDoor[]" value="E" />Elliot House

        <input type="submit" name="formSubmit" value="Submit" />
        /form>

        --><?php
/*        $aDoor = $_POST['formDoor'];
        if(empty($aDoor))
        {
            echo("You didn't select any buildings.");
        }
        else
        {
            $N = count($aDoor);

            echo("You selected $N door(s): ");
            for($i=0; $i < $N; $i++)
            {
                echo($aDoor[$i] . " ");
            }
        }
        */?>

</div>
<div class="d-flex justify-content-center">
    <a class="btn my-2 m-2 btn-success d-flex justify-content-center w-25" href="<?= router\url("album", "display") ?>">Retour</a>
    <a href="<?= router\url("photo", "submit_photo") ?>" class="btn my-2 m-2 btn-primary d-flex justify-content-center w-25"><input type="submit" hidden>Valider</a>
</div>

<?php include_once 'includable/footer.php';?>