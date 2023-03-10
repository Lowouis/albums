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
            "titre"=>"Edition de la photo",
            "photo"=>$nom,
            "albums"=>\models\album\get_all_names_album(),
            "assoc_alb"=>\models\album\get_album_by_photo($nom)
        ]);
    $_SESSION["photo"] = $nom;
}
function edit($nom){
    session_start();
    $_SESSION["photo_edit"] = true;
    display($nom);
    $_SESSION["photo"] = $nom;
    $_SESSION["photo_edit"] = false;

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
    $filename = \database\select("SELECT nomPh FROM photos WHERE idPh=".$id)[0]["nomPh"];
    $path = "public\data\\".$filename;
    if(!unlink($path)){
        $_SESSION["error"] = "Erreur lors de la suppression de la photo, la photo est supprimé de la base de donnée";
        \database\del("photos",$id);
        \models\events\insert_new_log(\database\select("SELECT id FROM users WHERE username='".$_SESSION["username"]."'", 0), "error_delete_photo");
    }else{
        $_SESSION["success"] = "La photo a bien été supprimée";
        \database\del("photos",$id);
        \models\events\insert_new_log(\database\select("SELECT id FROM users WHERE username='".$_SESSION["username"]."'", 0), "success_delete_photo");

    }

    redirect("album", "display", [$_SESSION["selected_album"]]);
}

function confirm_delete($id){
    $_SESSION["confirm_delete_photo"] = $id;
    redirect("album", "display", [$_SESSION["selected_album"]]);
}

function submit_photo(){
    if(isset($_FILES["submitted_photo"]) && isset($_POST["album"])){
        $maxsize = 50000000;
        $valid_ext = array('.jpg', '.jpeg', '.gif', '.png');
          if($_FILES["submitted_photo"]["error"] > 0){
              $_SESSION["error"] = "Erreur lors du transfert";
              redirect("photo", "add_photo");

        }

        $file_size = $_FILES["submitted_photo"]["size"];

        if($file_size >= $maxsize){
            $_SESSION["error"] = "Le fichier est trop gros.". ($maxsize/1000000). "mo max";
            redirect("photo", "add_photo");
        }

        $file_name = $_FILES["submitted_photo"]["full_path"];
        $file_ext = "." . strtolower(substr(strrchr($file_name, "."), 1));

        if(!in_array($file_ext, $valid_ext)){
            $_SESSION["error"] = "Extension incorrecte";
            redirect("photo", "add_photo");
        }

        $tmp_name = $_FILES["submitted_photo"]["tmp_name"];
        $unique_name = md5(uniqid(rand(), true));
        $path = "public/data/".$unique_name.$file_ext;

        $result = move_uploaded_file($tmp_name, $path);

        \models\photo\set($unique_name.$file_ext);
        $idPh = \models\album\get_idphoto_by_name($unique_name.$file_ext);
        //injecter dans comporter les albums associés à la photo qui sont stocker dans $_POST["sumbitted_photo"][

        foreach ($_POST["album"] as $album){
            $idAlb = \models\album\get_idalbum_by_name($album);
            \models\photo\set_album($idPh,$idAlb);
        }
        $_SESSION["success"] = "Votre photo a bien été ajoutée";
        \models\events\insert_new_log(\database\select("SELECT id FROM users WHERE username='".$_SESSION["username"]."'", 0), "success_photo_added");
        redirect("photo", "display", ["nomPh"=>$unique_name.$file_ext]);
    }
    else{
        $_SESSION["error"] = "Choisissez une photo et au moins un album";
        redirect("photo", "add_photo");
    }
}

function update_album(){
    session_start();
    \models\album\update_album_by_photo(\models\album\get_idphoto_by_name($_SESSION["photo"]), $_POST["album"]);
    \models\events\insert_new_log(\database\select("SELECT id FROM users WHERE username='".$_SESSION["username"]."'", 0), "update_albums_of_photo");
    redirect("photo", "edit", [$_SESSION["photo"]]);
}

