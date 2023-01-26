<?php


$connect = mysqli_connect("localhost", "root", "", "albums");

if (mysqli_connect_errno()) {
    echo "Echec de la connexion : ". mysqli_connect_error();
    exit();
}
$sqlQuery = "select nomAlb, idAlb from albums";
$res = mysqli_query($connect, $sqlQuery);
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Album - Dashboard</title>
    </head>
    <body>
    <h6 class="font-weight-bold text-lg-end ml-1 px-2" ><a href="index.php?album=1">Album</a></h6>
    <h1 class="h1 text-center">Mode admin</h1>
    <div class="d-flex justify-content-center">
        <form class="col-sm-8">
            <h3 class="p-2 text-lg-center">Ajouter une photo</h3>
            <div class="form-group ml-1 p-3">
                <label for="exampleInputEmail1" class="p-2">Nom de la photo </label>
                <input type="text" class="form-control p-2" placeholder="Entrez le nom de la photo">
                <small id="emailHelp" class="form-text text-muted">Merci de bien précisez l'extension de votre image</small>
            </div>
            <div class="form-group ml-1 p-3">
                <label class="p-2">Catégorie de la photo </label>
                <select class="form-select" id="cat-select">
                    <option value="" selected>--Séléctionner une catégorie--</option>
                    <option value="1">Chien</option>
                    <option value="2">Chat</option>
                    <option value="3">Oiseaux</option>
                </select>

            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success mx-auto w-25">Ajouter</button>
            </div>
        </form>
    </div>
    <div class="d-flex justify-content-center">

        <form class="col-sm-8">
            <h3 class="p-2 text-lg-center">Ajouter une catégorie</h3>
            <div class="form-group ml-1 p-3">
                <label for="exampleInputEmail1" class="p-2">Nom de la catégorie </label>
                <input type="text" class="form-control p-2" placeholder="Entrez le nom de la catégorie">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success mx-auto w-25">Ajouter</button>
            </div>
        </form>
    </div>


    <div class="d-flex justify-content-center">

        <form class="col-sm-8">
            <h3 class="p-2 text-lg-center">Modifier/Supprimer une photo</h3>
            <label class="p-2">Photo </label>
            <select class="form-select" id="cat-select">
                <option value="" selected>--Séléctionner une catégorie--</option>
                <option value="1">Chien</option>
                <option value="2">Chat</option>
                <option value="3">Oiseaux</option>
            </select>
            <div class="text-center">
                <button type="submit" class="btn btn-success mx-auto w-25">Modifier</button>
                <button type="submit" class="btn btn-danger mx-auto w-25">Supprimer</button>
            </div>
        </form>
    </div>
    </body>

</html>

<?php
mysqli_free_result($res);
mysqli_close($connect);
?>