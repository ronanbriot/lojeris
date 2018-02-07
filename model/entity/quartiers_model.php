<?php

function getAllQuartiers(): array
{
    global $connection;
$query = "SELECT
	  quartier.id,
    quartier.libelle,
    ville.libelle AS ville,
    ville.cp,
    CONCAT(ville.libelle, ' - ', quartier.libelle) AS libelle_complet
FROM quartier
INNER JOIN ville ON ville.id = quartier.ville_id;";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getOneQuartier(int $id): array
{
    global $connection;
    $query = "SELECT * FROM quartier WHERE id = :id";

    $stmt = $connection->prepare($query);
    $stmt -> bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}

function insertQuartier(string $libelle): void
{
    global $connection;
    $query = "INSERT INTO quartier (libelle) VALUES (:libelle)";

    $stmt = $connection->prepare($query);
    $stmt -> bindParam(":libelle", $libelle);
    $stmt->execute();
}

function updateQuartier(int $id, string $libelle): void
{
    global $connection;
    $query = "UPDATE quartier SET libelle = :libelle WHERE id = :id";

    $stmt = $connection->prepare($query);
    $stmt -> bindParam(":id", $id);
    $stmt -> bindParam(":libelle", $libelle);
    $stmt->execute();
}

function deleteQuartier(int $id): void
{
    global $connection;
    $query = "DELETE FROM quartier WHERE id = :id";

    $stmt = $connection->prepare($query);
    $stmt -> bindParam(":id", $id);
    $stmt->execute();
}
