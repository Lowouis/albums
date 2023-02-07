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
            "collection_name"=>\models\album\get($id == null ? 1 : $id)["nomAlb"],
            "photos"=>\models\photo\getby_album($id == null ? 1 : $id)
        ]);
}


function add_album_display(){
    view(
        "display_add_album",
        [
            "titre"=>"Ajouter un album",
        ]
    );
}

function confirm_album_add(){
    //ajouter dans sql avec la variable de sesssion
    \models\album\set();
    display();
}

function supprimerAlbum($id){
    \models\album\del($id);
    display();
}