<?php
session_start();

require_once __DIR__ . "/../model/database.php";

$referer = (isset($_SERVER['HTTP_REFERER'])) ? basename($_SERVER['HTTP_REFERER']) : "";

// Vérifier si le formulaire de login a été envoyé
if ($referer == "login.php" && isset($_POST["email"]) && isset($_POST["mot_de_passe"])) {
    $email = $_POST["email"];
    $mot_de_passe = $_POST["mot_de_passe"];

    // Recherche l'utilisateur en BDD
    $utilisateur = getUtilisateurByEmailMotDePasse($email, $mot_de_passe);

    // Vérifie si l'utilisateur existe en BDD
    if (isset($utilisateur["id"])) {
        // Stockage de l'id de l'utilisateur en session
        $_SESSION["id"] = $utilisateur["id"];
    }
} else if ($referer == "register.php" && isset($_POST["email"]) && isset($_POST["mot_de_passe"])) {
    // Vérifier si le formulaire de création de compte a été envoyé
    $email = $_POST["email"];
    $mot_de_passe = $_POST["mot_de_passe"];

    // Insérer l'utilisateur en BDD
    $utilisateur = insertUtilisateur($email, $mot_de_passe);
    $_SESSION["id"] = $utilisateur["id"];
} else {
    // Vérifier si l'utilisateur est connecté
    if (isset($_SESSION["id"])) {
        $utilisateur = getUtilisateur($_SESSION["id"]);
    }
}

if (!isset($utilisateur["id"]) || !$utilisateur["admin"]) {
    header("Location: login.php");
}
