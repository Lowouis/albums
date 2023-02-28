<?php
session_start();
include_once 'includable/header.php';
include_once 'includable/user.php'; ?>

<?php if(isset($_SESSION["confirm_danger"])): ?>
    <div class="d-flex justify-content-center">
        <div class="alert alert-danger fade show" role="alert">
            <strong>Attention!</strong> <?= $_SESSION["confirm_danger"] ?>
            <a class="btn btn-success" href="<?= router\url("user", "delete_user", [$_SESSION["confirm_danger_id"]]) ?>">Oui</a>
            <?= $_SESSION["confirm_danger_id"] ?>
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
            <th scope="col">Nom d'utilisateur</th>
            <th scope="col">Droit</th>
            <th scope="col">Modifier</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <th scope="row"><?= $user["id"] ?></th>
                <?php if(isset($_SESSION["edit_user"]) && $_SESSION["edit_user"] == $user["id"]): ?>
                    <td>
                        <form method="post" action="<?= router\url("user", "confirm_changes", [$user["id"]]) ?>">
                            <input class="form-control w-75" name="username" value="<?= $user["username"] ?>"/></td>
                        <td>
                            <select class="form-select w-75" name="access_id">
                            <?php foreach($access as $i => $label): ?>
                                <option <?= $i == $user["access"] ? "selected" : "" ?> value="<?= $i ?>"><?= $label ?></option>
                            <?php endforeach;?>
                            </select>
                        </td>

                <?php else: ?>

                    <td><?= $user["username"] ?></td>
                    <td><?= ctrl\user\get_access_label($user["access"]) ?? "null" ?></td>

                <?php endif; ?>



                <td class="col-sm d-flex justify-content-center">
                    <?php if(isset($_SESSION["edit_user"]) && $_SESSION["edit_user"] == $user["id"]): ?>
                        <input class="btn btn-sm btn-success m-1" type="submit" value="OK">
                        </form>
                    <?php else: ?>
                        <a href="<?= router\url("user", "edit_user", [$user["id"]]) ?>"><span class="m-1 sm material-symbols-outlined btn btn-primary btn-sm">settings</span></a>
                    <?php endif; ?>

                    <a <?= $_SESSION["access"] < 3 ? "disabled" : 'href='.router\url("user", "confirm_delete_user", [$user["id"]]).'"' ?> ><span class="m-1 material-symbols-outlined btn btn-danger btn-sm">remove</span></a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>




<?php include_once 'includable/footer.php';?>