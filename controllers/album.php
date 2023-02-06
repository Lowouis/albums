<?php
namespace ctrl\album;


function index(){
    return "display";
}
function display($id=null){
    session_start();
    view(
        "display_album",
        [
            "titre"=>"Album Photo",
            "collections"=>\models\album\get(),
            "photos"=>\models\photo\getby_album($id == null ? 1 : $id)
        ]);
}