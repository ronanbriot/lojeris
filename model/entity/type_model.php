<?php

function getAllTypes(): array {
    global $connection;
    $query = "SELECT * FROM type";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getOneType(int $id): array {
    global $connection;
    $query = "SELECT * FROM type WHERE id = :id";

    $stmt = $connection->prepare($query);
    $stmt -> bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}

function insertTypes(string $libelle): void {
    global $connection;
    $query = "INSERT INTO type (libelle) VALUES (:libelle)";

    $stmt = $connection->prepare($query);
    $stmt -> bindParam(":libelle", $libelle);
    $stmt->execute();
}

function updateType(int $id, string $libelle): void {
    global $connection;
    $query = "UPDATE type SET libelle = :libelle WHERE id = :id";

    $stmt = $connection->prepare($query);
    $stmt -> bindParam(":id", $id);
    $stmt -> bindParam(":libelle", $libelle);
    $stmt->execute();
}

function deleteType(int $id): void {
    global $connection;
    $query = "DELETE FROM type WHERE id = :id";

    $stmt = $connection->prepare($query);
    $stmt -> bindParam(":id", $id);
    $stmt->execute();
}
