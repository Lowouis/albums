<?php
session_start();
include_once 'includable/header.php';
include_once "includable/user.php";
?>



<div class="col-md-4 mx-auto">
        <img class="card-img-top" src="<?= router\web('data/', $photo)?>">
</div>
    <div class="d-flex justify-content-center">
        <a class="btn my-2 m-2 btn-success d-flex justify-content-center w-25" href="<?= router\url("album", "display") ?>">Retour</a>
    </div>

<?php include_once 'includable/footer.php';?>