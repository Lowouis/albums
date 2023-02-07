<?php
session_start();
include_once 'includable/header.php';
include_once "includable/user.php";
echo $assoc_alb;
?>

<div class="col-md-4 mx-auto">
        <img class="card-img-top" src="<?= router\web('data/', $photo).".jpg" ?>">

    <div class="card-body d-flex align-items-end">
        <div class="absolute-bottom">
            <h5 class="card-title"><?= $photo ?></h5>
            <?php if(isset($_SESSION["username"])): ?>
            <a  class="btn btn-success"><span class="material-symbols-outlined">edit</span></a>
            <a  class="btn btn-danger"><span class="material-symbols-outlined">delete</span></a>
            <?php endif; ?>
        </div>
    </div>
</div>
    <div class="d-flex justify-content-center">
        <a class="btn my-2 m-2 btn-success d-flex justify-content-center w-25" href="<?= router\url("album", "display") ?>">Retour</a>
    </div>

<?php include_once 'includable/footer.php';?>