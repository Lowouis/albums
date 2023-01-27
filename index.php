<?php
include_once("libraries/utility.php");
utility\includeAll("libraries/");
utility\includeAll("models/");


database\connect("localhost", "root", "", "albums");

if(mysqli_connect_errno()){
    echo "What you try to do m8... : ". mysqli_connect_error();
    exit();
}


if(file_exists("controllers/".router\controller().".php")){

    include("controllers/".router\controller().".php");
    $action="ctrl\\".router\controller()."\\".router\action();
    if(function_exists($action)){
        count(router\param())>0 ? call_user_func_array($action, router\param()) : $action(null);

    }
    else{
        echo "ERREUR : cette action n'existe pas pour le contrôleur ".router\controller();
    }
}
else{
    echo "ERREUR : ce contrôleur n'existe pas";
}