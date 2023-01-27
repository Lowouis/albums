<?php include_once 'includable/header.php'; ?>
<?php include_once 'includable/nav.php'; ?>
<?php include_once 'includable/pop_add_album.php'; ?>

<div class="container d-flex flex-wrap">
<?php foreach ($photos as $photo):?>

    <div class="card w-25 m-2">
        <img    class="card-img-top"
                src="<?= router\web('data/', $photo['nomPh']).".jpg" ?>">
        <div class="card-body d-flex align-items-end">
            <div class=" absolute-bottom">
                <h5 class="card-title"><?= $photo['nomPh'] ?></h5>
                <button class="btn btn-success">Modifier</button>
                <button class="btn btn-danger">Supprimer</button>
            </div>

        </div>
    </div>


<?php endforeach; ?>
</div>
<?php include_once 'includable/footer.php';?>