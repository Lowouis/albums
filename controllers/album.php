<?php
namespace ctrl\album;


function index(){
    return "display";
}
function display($id=null){
    view(
        "display_album",
        [
            "titre"=>"Album de photo",
            "collections"=>\models\album\get(),
            "photos"=>\models\photo\getby_album($id == null ? 1 : $id)
        ]);
}

function delete($id){
    //supprimer un album
    return \database\get("photos",$id);
}

function add_collection($collection){
    //ajouter un album
    return null;
}