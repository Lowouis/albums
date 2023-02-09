<?php

namespace models\album;

use Exception;
use mysql_xdevapi\Result;

function get($id=0){
    return \database\get("albums", $id);
}

function getnameAlbum($id){
    $sql = "SELECT nomAlb FROM albums where idAlb=".$id;
    return \database\get($sql);
}

function get_all_names_album(){
    $sql = "SELECT nomAlb FROM albums";
    return \database\select($sql, 2);
}

function set(){
    \database\set("albums",$_POST, 0);
}

function del($id){
    \database\del("albums", $id);
}

function get_album_by_photo($nomPh){
    $sql = "SELECT nomAlb FROM comporter JOIN albums ON comporter.idAlb=albums.idAlb JOIN photos on photos.idPh=comporter.idPh WHERE photos.nomPh='".$nomPh."'";
    return \database\select($sql, 2);
}

function get_idalbum_by_name($nomAlb){
    $sql = "SELECT idAlb FROM albums WHERE nomAlb='".$nomAlb."'";
    return \database\select($sql, 0);
}
function get_namealbum_by_id($idAlb){
    $sql = "SELECT nomAlb FROM albums WHERE idAlb='".$idAlb."'";
    return \database\select($sql, 0);
}




function update_album_by_photo($idPh, $tabAlb){

    try{
        \database\del("comporter", ["idPh"=>$idPh]);
        foreach ($tabAlb as $alb){
            \database\set("comporter", ["idPh"=>$idPh, "idAlb"=>$alb]);
        }
    }
    catch(Exception $e){
        $_SESSION["error"] = "ERREUR EXCEPTION";
    }


}

