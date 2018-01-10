<?php
require_once __DIR__ . "/../../security.php";
require_once __DIR__ . "/../../../model/database.php";

$id = $_GET["id"];

deleteMariage($id);

header("Location: index.php");