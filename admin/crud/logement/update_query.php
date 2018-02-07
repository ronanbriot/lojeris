<?php
require_once __DIR__ . "/../../security.php";
require_once __DIR__ . "/../../../model/database.php";

$id = $_POST["id"];
$date_evenement = $_POST["date_evenement"];
$lieu = $_POST["lieu"];
$theme_id = $_POST["theme_id"];

$image = $_FILES["image"]["name"];

if (empty($image)) {
    $evenement = getMariage($id);
    $image = $evenement["image"];
} else {
    move_uploaded_file($_FILES["image"]["tmp_name"], __DIR__ . "/../../../images/" . $image);
}

updateMariage($id, $date_evenement, $lieu, $image, $theme_id);

header('Location: index.php');