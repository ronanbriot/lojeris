<?php
require_once __DIR__ . "/../../security.php";
require_once __DIR__ . "/../../../model/database.php";

$date_evenement = $_POST["date_evenement"];
$lieu = $_POST["lieu"];
$image = $_FILES["image"]["name"];
$theme_id = $_POST["theme_id"];

move_uploaded_file($_FILES["image"]["tmp_name"], __DIR__ . "/../../../images/" . $image);

insertMariage($date_evenement, $lieu, $image, $theme_id, $utilisateur["id"]);

header('Location: index.php');