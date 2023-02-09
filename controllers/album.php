<?php
namespace ctrl\album;


function index(){
    return "display";
}
function display($id=null){
    session_start();
    $id = $id ?? \database\select("SELECT idAlb FROM albums LIMIT 1")[0]["idAlb"];
    $_SESSION["selected_album"] = $id;
    view(
        "display_album",
        [
            "titre"=>"Album Photo",
            "collections"=>\models\album\get(),
            "collection_name"=> gettype(\models\album\get($id)) != "boolean" ? \models\album\get($id)["nomAlb"] : $_SESSION["success"]="Aucun album n'a été trouvé, créer en un.",
            "photos"=>\models\photo\getby_album($id)
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
    redirect("album", "display");
}

function delete_album($id){
    \models\album\del($id);

    redirect("album", "display");
}

function confirm_delete_album($id){
    session_start();
    $_SESSION["confirm_delete_album"] = ["nomAlb"=>\models\album\get_namealbum_by_id($id), "idAlb"=>$id];
    redirect("album", "display",["idAlb"=>$id]);

}