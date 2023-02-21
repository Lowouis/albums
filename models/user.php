<?php

namespace models\user;

function get_user($id){
    return \database\get("users", $id);
}

function auth($user, $pass){
    $sql = "SELECT COUNT(*) FROM users WHERE password='".$pass."' AND username='". $_POST["username"]."'";
    return \database\select($sql,0)==1;

}


function register($user, $pass, $confirm){
    session_start();
    if($user=="" || $pass=="" || $confirm==""){
        $_SESSION["error"] = "Veuillez remplir tous les champs.";
        return false;
    }
    elseif ($pass != $confirm){
        $_SESSION["error"] = "Les mots de passe ne correspondent pas.";
        return false;
    }
    elseif(strlen($_POST["password"]) < 8){
        $_SESSION["error"] = "Le mot de passe doit contenir au moins 8 caractères.";
        return false;
    }
    $_SESSION["success"] = "Merci de vous être enregistré. Vous pouvez maintenant vous connecter";

    $encypted_pw = md5($_POST["password"]);
    \database\set("users", ["username"=>$_POST["username"], "password"=>$encypted_pw]);
    die();
    return true;
}

