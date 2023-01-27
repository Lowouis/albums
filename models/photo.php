<?php

namespace models\photo;

function get($id=0){
    return \database\get("photo", $id);
}


function getby_album($id){
   return \database\select("select * from photos inner join comporter on photos.idPh = comporter.idPh where comporter.idAlb=".$id);
}

?>