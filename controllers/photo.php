<?php
namespace ctrl\photo;


function index(){
    return "display";
}
function display($id=null){
    view(
        "display_album",
        [
            "titre"=>"Photo",
            "photo"=>\models\album\get($id),
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