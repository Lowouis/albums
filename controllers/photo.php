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
            "albums"=>\models\album\get_all_names_album(),
            "assoc_alb"=>\models\album\get_album_by_photo($nom)
        ]);
}
function add_photo(){
    view(
        "display_add_photo",
        [
            "titre"=>"Ajouter une photo",
            "albums"=> \models\album\get_all_names_album()
        ]
    );
}
function delete($id){
    return \database\get("photos",$id);
}

function submit_photo(){
    $target_dir = "./public/data/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["photo"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["uploadphoto"])){
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false){
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    \ctrl\album\display();
}