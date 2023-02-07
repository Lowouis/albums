<?php
namespace ctrl\photo;


function index(){
    return "display";
}
function display($nom){
    view(
        "display_photo",
        [
            "titre"=>"Photo : ".$nom,
            "photo"=>$nom,
            "assoc_alb"=>\models\album\assoc_album($nom)
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