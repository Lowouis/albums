<?php
include_once 'includable/header.php';
include_once 'includable/user.php'; ?>

<?php if(isset($_SESSION["confirm_danger"])): ?>
    <div class="d-flex justify-content-center">
        <div class="alert alert-danger fade show" role="alert">
            <strong>Attention!</strong> <?= $_SESSION["confirm_danger"] ?>
            <a class="btn btn-success" href="<?= router\url("user", "delete_user", [$_SESSION["confirm_danger_id"]]) ?>">Oui</a>
            <a class="btn btn-danger" href="<?= router\url("user", "manager") ?>">Non</a>
        </div>
    </div>
    <?php unset($_SESSION["confirm_danger"]);unset($_SESSION["confirm_danger_id"]) ?>
<?php endif; ?>

<div class="d-flex justify-content-center">
    <table class="table table-striped table-hover w-50">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Utilisateur</th>
                <th scope="col">Droit</th>
                <th scope="col">Évènement</th>
                <th scope="col">Date</th>
            </tr>

        </thead>
        <tbody>
        <?php foreach ($logs as $log): ?>
        <tr>
            <th scope="row"><?= $log["id"] ?></th>
            <td><?= $log["username"] ?></td>
            <td><?= \models\user\get_access_label($log["access"]) ?></td>
            <td><?= $log["event_name"] ?></td>
            <td><?= $log["date"] ?></td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>




<?php include_once 'includable/footer.php';?>