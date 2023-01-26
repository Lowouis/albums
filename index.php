<?php


$connect = mysqli_connect("localhost", "root", "", "albums");

if (mysqli_connect_errno()) {
    echo "What you try to do m8... : ". mysqli_connect_error();
    exit();
}
if(!isset($_GET['album'])){
    $_GET['album'] = 1;
}






?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Album</title>
    </head>
    <body>
    <h6 class="font-weight-bold text-lg-end ml-1 px-2" ><a href="dashboard.php">Admin</a></h6>
    <h1 class="h1 text-center">Mes albums</h1>
    <div>


    </div>

    </body>

</html>

<?php
mysqli_free_result($res);
mysqli_close($connect);
?>