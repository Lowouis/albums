<?php
session_start();
include_once 'includable/header.php';
include_once 'includable/nav.php';

?>

<div class="container">
    <div class="row">
<?php foreach ($photos as $photo):?>


    <div class="col-md-4">
        <a href="<?= router\url("photo","display", [$photo['nomPh'], $photo['idPh']]) ?>">
            <img class="card-img-top" src="<?= router\web('data/', $photo['nomPh']).".jpg" ?>">
        </a>

        <div class="card-body d-flex align-items-end">
            <div class="absolute-bottom">
                <h5 class="card-title"><?= $photo['nomPh'] ?></h5>
                <?php if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION["username"])): ?>
                <a  class="btn btn-success"><span class="material-symbols-outlined">edit</span></a>
                <a  class="btn btn-danger"><span class="material-symbols-outlined">delete</span></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
    </div>
</div>
<?php if(isset($_SESSION["username"])): ?>
    <div class="d-flex justify-content-center">
        <a class="btn my-2 m-2 btn-success d-flex justify-content-center w-25" href="<?= router\url("photo", "add_photo") ?>">Ajouter une photo</a>
    </div>
<?php endif; ?>

<?php include_once 'includable/footer.php';?>