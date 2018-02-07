<?php

function getAllCommerciaux(): array {
    global $connection;
    $query = "SELECT *, CONCAT(nom, ' ', prenom) AS nom_prenom FROM commercial";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getOneCommercial(int $id): array {
    global $connection;
    $query = "SELECT * FROM commercial WHERE id = :id";

    $stmt = $connection->prepare($query);
    $stmt -> bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}

function insertCommercials(string $libelle): void {
    global $connection;
    $query = "INSERT INTO commercial (libelle) VALUES (:libelle)";

    $stmt = $connection->prepare($query);
    $stmt -> bindParam(":libelle", $libelle);
    $stmt->execute();
}

function updateCommercial(int $id, string $libelle): void {
    global $connection;
    $query = "UPDATE commercial SET libelle = :libelle WHERE id = :id";

    $stmt = $connection->prepare($query);
    $stmt -> bindParam(":id", $id);
    $stmt -> bindParam(":libelle", $libelle);
    $stmt->execute();
}

function deleteCommercial(int $id): void {
    global $connection;
    $query = "DELETE FROM commercial WHERE id = :id";

    $stmt = $connection->prepare($query);
    $stmt -> bindParam(":id", $id);
    $stmt->execute();
}

function getAllCommerciauxByLogement(int $id): array {
    global $connection;
    $query = "SELECT
        	commercial.*, CONCAT(nom, ' ', prenom) AS nom_prenom
          FROM commercial
          INNER JOIN logement_has_commercial ON logement_has_commercial.commercial_id = commercial.id
          WHERE logement_has_commercial.logement_id = :id; ";

    $stmt = $connection->prepare($query);
    $stmt -> bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetchAll();
}
