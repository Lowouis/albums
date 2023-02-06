<?php

namespace models\user;

function get_user($id){
    return \database\get("users", $id);
}

function auth($user, $pass){
    var_dump(true);
    $sql = "SELECT * FROM users WHERE password=".$pass;
    var_dump(\database\query($sql));
    if(\database\query($sql)){
        return true;
    }
    return false;

}


function register(){
    if($_POST["username"] != "" && strlen($_POST["password"]) > 8){
        \database\set("users", $_POST);
        return true;
    }
    return false;
}

