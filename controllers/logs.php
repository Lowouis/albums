<?php
namespace ctrl\logs;



function index(){
    return "dashboard";
}
function dashboard(){
    view(
        "display_logs",
        [
            "titre"=>"Logs des utilisateurs",
            "logs"=>\models\events\get_logs(),
        ]);
}