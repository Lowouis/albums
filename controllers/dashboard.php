<?php
namespace ctrl\dashboard;


function index(){
    return "display";
}
function display($id=null){
    view(
        "display_admin",
        [
            "titre"=>"Album de photo",
            "collections"=>\models\album\get(),
            "photos"=>\models\photo\getby_album($id == null ? 1 : $id)
        ]);
}

