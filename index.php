<?php


$connect = mysqli_connect("localhost", "root", "", "albums");

if (mysqli_connect_errno()) {
    echo "Echec de la connexion : ". mysqli_connect_error();
    exit();
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
        <div>
            <?php
            $sqlQuery = "select nomAlb, idAlb from albums";
            $res = mysqli_query($connect, $sqlQuery);
            while($lignes = mysqli_fetch_array($res, MYSQLI_ASSOC)){
                echo '<a class="btn btn-link" href="index.php?album='.$lignes["idAlb"].'">'.$lignes["nomAlb"].'</a>';
            }
            ?>
        </div>
        
        
        <div>
            <?php
            $sqlQuery = "select * from photos inner join comporter on photos.idPh = comporter.idPh where comporter.idAlb=".$_GET["album"];
            $res = mysqli_query($connect, $sqlQuery);
            while($lignes = mysqli_fetch_array($res, MYSQLI_ASSOC)){
                echo '<img class="img-fluid w-25 p-3" src="data/'.$lignes['nomPh'].'.jpg">';
            }
            ?>
        </div>

    </div>

    </body>

</html>

<?php
mysqli_free_result($res);
mysqli_close($connect);
?>