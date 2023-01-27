<nav class="d-flex justify-content-center">
    <?php foreach ($collections as $label):?>
        <a  class="btn btn-primary  p-2 m-2"
            href="<?= router\url("album","display", [$label["idAlb"]]) ?>"><?= $label["nomAlb"] ?></a>
    <?php endforeach; ?>
</nav>