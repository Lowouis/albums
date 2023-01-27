<nav class="d-flex justify-content-center">
    <?php foreach ($collections as $label):?>
    <div class="">
        <a  class="btn btn-primary p-1 m-1"
            href="<?= router\url("album","display", [$label["idAlb"]]) ?>"><?= $label["nomAlb"] ?><a class="btn btn-danger p-1 m-1">X</a></a>

        </div>
    <?php endforeach; ?>
    <button type="button" class="btn btn-primary p-1 m-1" data-toggle="modal" data-target="#exampleModalCenter">Ajouter album</button>


</nav>