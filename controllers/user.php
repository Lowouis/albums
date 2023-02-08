<?php
namespace ctrl\user;


function index(){
    return "login";
}
function login(){
    view(
        "display_login",
        [
            "titre"=>"Connexion"
        ]);
}
function logged(){
    if(\models\user\auth($_POST["username"], $_POST["password"])){
        $_SESSION["username"] = $_POST["username"];
        redirect("album", "display");
    }
    else{
        redirect("user", "login");
    }

}

function logout(){
    unset($_SESSION["username"]);
    redirect("album", "display");
}


function register($id=null, $userid=null){
    view(
        "display_register",
        [
            "titre"=>"S'enregistrer"
        ]);
}