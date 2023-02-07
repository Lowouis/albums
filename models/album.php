<?php

namespace models\album;

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

