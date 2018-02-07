<?php
require_once __DIR__ . "/../../security.php";
require_once __DIR__ . "/../../../model/database.php";

$id = $_GET["id"];

try {
    deleteLogement($id);
} catch (PDOException $exc) {
    http_response_code(500);
    $errorCode = $exc->errorInfo[0]; // Récupérer le code d'erreur PDO
    switch ($errorCode) {
        case 23000:
            echo "Suppression impossible";
            break;
        default:
            echo "Erreur lors de la suppression";
            break;
    }
}
