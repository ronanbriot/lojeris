<?php
require_once __DIR__ . "/../../security.php";
require_once __DIR__ . "/../../../model/database.php";

$quartier_id = $_POST["quartier_id"];
$type_id = $_POST["type_id"];
$commerciaux_ids = [];
if (isset($_POST["commerciaux_ids"])){
  $commerciaux_ids = $_POST["commerciaux_ids"];
}
$commerciaux_ids = $_POST["commerciaux_ids"];
$prix = $_POST["prix"];
$surface = $_POST["surface"];
$nb_chambres = $_POST["nb_chambres"];
$description = $_POST["description"];

$image = $_FILES["image"]["name"];
$image_file = $_FILES["image"]["tmp_name"];
$utilisateur_id = $utilisateur["id"];

move_uploaded_file($image_file, "../../../images/" . $image);

insertLogement($image, $prix, $surface, $nb_chambres, $description, $type_id, $quartier_id, $utilisateur_id, $commerciaux_ids);

header('Location: index.php');
