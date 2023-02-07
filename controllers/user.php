<?php
namespace ctrl\user;


function index(){
    return "login";
}
function login(){
    view(
        "display_login",
        [
            "titre"=>"Login"
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

function registred(){
    view(
        \models\user\register() ? "display_register_success" : "display_register",
        [
            "titre"=>"Register"
        ]);

}

function register($id=null, $userid=null){
    view(
        "display_register",
        [
            "titre"=>"Register"
        ]);
}