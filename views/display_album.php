<?php include_once 'includable/header.php'; ?>
<?php include_once 'includable/nav.php'; ?>


<div class="container">
<?php foreach ($photos as $photo):?>
    <img    class="img-fluid shadow-1-strong rounded p-2 col-lg-2 col-md-8"
            src="<?= router\web('data/', $photo['nomPh']).".jpg" ?>">

<?php endforeach; ?>
</div>

<?php include_once 'includable/footer.php';?>