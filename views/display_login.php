<?php include_once 'includable/header.php'; ?>
<div class="d-flex justify-content-center">
    <form action="<?= router\url("user","logged") ?>" method="post" class="col-md-4">
        <div class="form-group ">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password"  class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
        </div>
        <button type="submit" class="btn btn-primary">Connect</button>
        <a href="<?= router\url("user","register") ?>" class="btn btn-success">Register</a>

    </form>
</div>
<?php include_once 'includable/footer.php';?>