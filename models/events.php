<?php

namespace models\events;

$eventList = ["login", "logout", "register", "delete_photo", "edit_photo", "delete_album", "edit_album", "create_album", "upload_photo"];


function insert_new_log($id, $event){
    \database\set("logs", ["id_user"=>$id, "event_name"=>$event, "date"=>date("Y-m-d H:i:s")]);
}

function get_logs(){
    return \database\select("SELECT * FROM logs JOIN users ON users.id = logs.id_user order by date desc");
}

function delete_log($id){
    \database\del("logs", $id);
}

function get_logs_by_user($id){
    return \database\select("SELECT * FROM logs WHERE id_user = $id");
}



