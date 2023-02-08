<?php

namespace models\photo;

function get($id=0){
    return \database\get("photos", $id);
}


function getby_album($id){
   return \database\select("select * from photos inner join comporter on photos.idPh = comporter.idPh where comporter.idAlb=".$id);
}

function set($nomPh){
    echo "nomPh : ".$nomPh;
    \database\set("photos",["nomPh"=>$nomPh]);
}

function set_album($idPh, $idAlb){
    \database\set("comporter",["idPh"=>$idPh, "idAlb"=>$idAlb], 0);
}

function del($id){
    return \database\del("photos", $id);
}

?>