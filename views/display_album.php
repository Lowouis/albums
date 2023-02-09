<?php
session_start();
include_once 'includable/header.php';
include_once 'includable/nav.php';

?>

<div class="container">
    <div class="row">
<?php foreach ($photos as $photo):?>
    <div class="col-md-3">
        <a href="<?= router\url("photo","display", [$photo['nomPh'], $photo['idPh']]) ?>">
                <img class="img-fluid" src="<?= router\web('data/', $photo['nomPh'])?>">
        </a>

        <div class="mt-3 mb-3">
            <div class="absolute-bottom">
                <?php if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION["username"])): ?>
                <a  href="<?= router\url("photo","edit", [$photo['nomPh'], $photo['idPh']]) ?>" class="btn btn-success"><span class="material-symbols-outlined">edit</span></a>
                <a  href="<?= router\url("photo","confirm_delete", [$photo['idPh']]) ?>"  class="btn btn-danger"><span class="material-symbols-outlined">delete</span></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
    </div>
</div>


<?php include_once 'includable/footer.php';?>