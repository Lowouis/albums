<?php
namespace ctrl\photo;


function index(){
    return "display";
}
function display($nom){
    session_start();
    view(
        "display_photo",
        [
            "titre"=>"Photo : ".$nom,
            "photo"=>$nom,
            "albums"=>\models\album\get_all_names_album(),
            "assoc_alb"=>\models\album\get_album_by_photo($nom)
        ]);
    $_SESSION["photo"] = $nom;
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
    if(isset($_FILES["submitted_photo"]) && isset($_POST["album"])){

        $maxsize = 50000000;
        $valid_ext = array('.jpg', '.jpeg', '.gif', '.png');
          if($_FILES["submitted_photo"]["error"] > 0){
            echo "Erreur lors du transfert";
        }

        $file_size = $_FILES["submitted_photo"]["size"];

        if($file_size >= $maxsize){
            echo "Le fichier est trop gros.". ($maxsize/1000000). "mo max";
        }

        $file_name = $_FILES["submitted_photo"]["full_path"];
        $file_ext = "." . strtolower(substr(strrchr($file_name, "."), 1));

        if(!in_array($file_ext, $valid_ext)){
            echo "Extension incorrecte";
        }

        $tmp_name = $_FILES["submitted_photo"]["tmp_name"];
        $unique_name = md5(uniqid(rand(), true));
        $fileName = "public/data/".$unique_name.$file_ext;

        $result = move_uploaded_file($tmp_name, $fileName);

        \models\photo\set($unique_name.$file_ext);
        $idPh = \models\album\get_idphoto_by_name($unique_name.$file_ext);
        //injecter dans comporter les albums associés à la photo qui sont stocker dans $_POST["sumbitted_photo"][

        foreach ($_POST["album"] as $album){
            $idAlb = \models\album\get_idalbum_by_name($album);
            \models\photo\set_album($idPh,$idAlb);
        }
        session_start();
        $_SESSION["success"] = "Votre photo a bien été ajoutée";
        redirect("photo", "display", ["nomPh"=>$unique_name.$file_ext]);
    }
    else{
        session_start();
        $_SESSION["error"] = "Choisissez une photo et au moins un album";
        redirect("photo", "add_photo");
    }
}

function update_album(){
    session_start();
    \models\album\update_album_by_photo(\models\album\get_idphoto_by_name($_SESSION["photo"]), $_POST["album"]);

}


function delete_photo($idPh){
    \models\photo\del($idPh) ? redirect("album", "display") : redirect("album", "display");
}