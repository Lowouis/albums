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
        session_start();
        $_SESSION["username"] = $_POST["username"];
        redirect("album", "display");
    }
    else{
        redirect("user", "login");
    }

}

function logout(){
    echo "zzzzz";
    session_abort();
    session_destroy();
    var_dump($_SESSION);

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