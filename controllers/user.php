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
    if(\models\user\auth($_POST["username"], md5($_POST["password"]))){
        $_SESSION["username"] = $_POST["username"];
        redirect("album", "display");
    }
    else{
        $_SESSION["error"] = "Mot de passe ou nom d'utilisateur incorrect.";
        redirect("user", "login");
    }

}

function logout(){
    unset($_SESSION["username"]);
    $_SESSION["success"] = "A bientôt !";
    redirect("album", "display");
}

function registred(){
    \models\user\register($_POST["username"],$_POST["password"],$_POST["password_confirm"]) ? redirect("album", "display") : redirect("user", "register");
}

function register($id=null, $userid=null){
    view(
        "display_register",
        [
            "titre"=>"S'enregistrer"
        ]);
}