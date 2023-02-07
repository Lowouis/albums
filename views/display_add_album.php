<?php

include_once 'includable/header.php'; ?>

<div class="d-flex justify-content-center">
    <div class="form-group">
        <form class="m-2" method="post" action="<?= router\url("album","confirm_album_add") ?>">
            <label class="m-2">Nouvel album</label>
            <input class="form-control m-2" placeholder="Entrez un nom d'album" type="text" name="nomAlb">
            <a href="<?= router\url("album","display") ?>" class="btn btn-primary m-2" >Back</a>
            <button class="btn btn-success m-2" >Add</button>
        </form>
    </div>
</div>
<?php include_once 'includable/footer.php';?>