<?php

namespace models\album;

function get($id=0){
    return \database\get("albums", $id);
}

function getnameAlbum($id){
    $sql = "SELECT nomAlb FROM albums where idAlb=".$id;
    return \database\get($sql);
}

function set(){
    \database\set("albums",$_POST, 0);
}

function del($id){
    \database\del("albums", $id);
}

function assoc_album($nomPh){
    $sql = 'SELECT albums.* FROM comporter JOIN albums ON comporter.idAlb=albums.idAlb WHERE nomPh="'.$nomPh.'"';
    return \database\select($sql);
}

?>