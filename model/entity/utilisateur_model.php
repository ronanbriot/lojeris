<?php

function getUtilisateur($id) {
    global $connection;

    $query = "SELECT
                utilisateur.id,
                utilisateur.email,
                utilisateur.admin
            FROM utilisateur
            WHERE utilisateur.id = :id
            ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}

function getUtilisateurByEmailMotDePasse($email, $mot_de_passe) {
    global $connection;

    $query = "SELECT
                utilisateur.id,
                utilisateur.email,
                utilisateur.admin
            FROM utilisateur
            WHERE utilisateur.email = :email
            AND utilisateur.mot_de_passe = SHA1(:mot_de_passe)
            ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":mot_de_passe", $mot_de_passe);
    $stmt->execute();

    return $stmt->fetch();
}

function insertUtilisateur($email, $mot_de_passe) {
    global $connection;

    $query = "
        INSERT INTO utilisateur (email, mot_de_passe, admin)
            VALUES (:email, SHA1(:mot_de_passe), false);
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":mot_de_passe", $mot_de_passe);
    $stmt->execute();

    return getUtilisateur($connection->lastInsertId());
}
