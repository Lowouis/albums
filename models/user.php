<?php

namespace models\user;

function get_user($id){
    return \database\get("users", $id);
}

function auth($user, $pass){
    $sql = "SELECT COUNT(*) FROM users WHERE password='".$pass."' AND username='". $_POST["username"]."'";
    return \database\select($sql,0)==1;

}


function register(){
    if($_POST["username"] != "" && strlen($_POST["password"]) >= 8){
        \database\set("users", $_POST);
        return true;
    }
    return false;
}

