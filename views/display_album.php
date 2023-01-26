<?php include_once 'header.php'; ?>

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
        echo '<img class="img-fluid w-25 p-3" src="public/data/'.$lignes['nomPh'].'.jpg">';
    }
    ?>
</div>

<?php include_once 'footer.php';?>