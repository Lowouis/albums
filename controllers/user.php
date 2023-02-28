<?php
namespace ctrl\user;


use function models\album\set;

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

function manager(){
    view(
        "display_manager",
        [
            "titre"=>"Gestion des utilisateurs",
            "users"=>\models\user\get_all_users(),
            "access"=>getAccess()
        ]);
}
function get_user($id){
    return \models\user\get_user($id);
}

function confirm_delete_user($id){
    $_SESSION["confirm_danger"] = "Voulez-vous vraiment supprimer cet utilisateur ?";
    $_SESSION["confirm_danger_id"] = $id[0];
    redirect("user", "manager");
}

function delete_user($id){
    var_dump($id);
    \database\del("users", ["id"=>$id]);
    redirect("user", "manager");
}

function edit_user($id){
    $_SESSION["edit_user"] = $id;
    redirect("user", "manager");
}

function confirm_changes($id){
    \models\user\edit_user($id, $_POST["username"], $_POST["access_id"]);
    $_SESSION["confirm_success"] = "L'utilisateur a bien été modifié.";
    unset($_SESSION["edit_user"]);
    redirect("user", "manager");
}
function get_access_label($access){
    $listOfAccess = ["Utilisateur","Modérateur","Administrateur", "Super Administrateur"];
    return $listOfAccess[$access] ?? null;
}

function get_access_name_of_user($id){
    return get_access_label(\models\user\get_user_access($id));
}
function getAccess(){
    return $listOfAccess = ["Utilisateur","Modérateur","Administrateur", "Super Administrateur"];
}


function logged(){
    if(\models\user\auth($_POST["username"], md5($_POST["password"]))){
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["access"] = \database\select("SELECT access FROM users WHERE username='".$_SESSION["username"]."' AND password='".md5($_POST["password"])."'")[0]["access"];
        \models\events\insert_new_log(\database\select("SELECT id FROM users WHERE username='".$_SESSION["username"]."' AND password='".md5($_POST["password"])."'", 0), "login");
        redirect("album", "display");

    }
    else{
        $_SESSION["error"] = "Mot de passe ou nom d'utilisateur incorrect.";
        \models\events\insert_new_log(\database\select("SELECT id FROM users WHERE username='".$_SESSION["username"]."'", 0), "login_failed");
        redirect("user", "login");
    }

}

function logout(){
    \models\events\insert_new_log(\database\select("SELECT id FROM users WHERE username='".$_SESSION["username"]."'", 0), "logout");
    unset($_SESSION["username"]);
    redirect("album", "display");
}

function registred(){
    \models\user\register($_POST["username"],$_POST["password"],$_POST["password_confirm"]) ? redirect("album", "display") : redirect("user", "register");
    \models\events\insert_new_log(\database\select("SELECT id FROM users WHERE username='".$_SESSION["username"]."'", 0), "registering");

}

function register($id=null, $userid=null){
    view(
        "display_register",
        [
            "titre"=>"S'enregistrer"
        ]);
}