<?php

namespace models\album;

function get($id=0){
    return \database\get("albums", $id);
}

?>