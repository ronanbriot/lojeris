<?php

function getAllLogements($limit = 999): array {
    global $connection;
    $query = "SELECT
                    logement.id,
                    CONCAT(ville.libelle, ' - ', quartier.libelle) AS libelle,
                    logement.prix,
                    logement.image,
                    logement.surface,
                    logement.nb_chambres,
                    logement.date_creation,
                    DATE_FORMAT(logement.date_creation, '%d/%m/%Y') AS date_creation_format,
                    quartier.libelle AS quartier,
                    ville.libelle AS ville,
                    type.libelle AS type
                FROM logement
                INNER JOIN type ON type.id = logement.type_id
                INNER JOIN quartier ON quartier.id = logement.quartier_id
                INNER JOIN ville ON ville.id = quartier.ville_id
                ORDER BY logement.date_creation DESC
                LIMIT :limit;";

    $stmt = $connection->prepare($query);
    $stmt->bindparam(":limit", $limit);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getOneLogement(int $id): array {
  global $connection;
  $query = "SELECT
	CONCAT(ville.libelle, ' - ', quartier.libelle) AS libelle,
	logement.prix,
    logement.description,
    logement.image,
    logement.surface,
    logement.nb_chambres,
    logement.date_creation,
    DATE_FORMAT(logement.date_creation, '%d/%m/%Y') AS date_creation_format,
    quartier.libelle AS quartier,
    ville.libelle AS ville,
    type.libelle AS type
FROM logement
INNER JOIN type ON type.id = logement.type_id
INNER JOIN quartier ON quartier.id = logement.quartier_id
INNER JOIN ville ON ville.id = quartier.ville_id
WHERE logement.id = :id;";

  $stmt = $connection->prepare($query);
  $stmt->bindparam(":id", $id);
  $stmt->execute();

  return $stmt->fetch();
}

function insertLogement(?string $image, int $prix, int $surface, int $nb_chambres, string $description, int $type_id, int $quartier_id, int $utilisateur_id, array $commerciaux_ids): void {
    global $connection;
    $query = "INSERT INTO logement (image, prix, surface, nb_chambres, description, date_creation, type_id, quartier_id, utilisateur_id) VALUES (:image, :prix, :surface, :nb_chambres, :description, NOW(), :type_id, :quartier_id, :utilisateur_id)";

    $stmt = $connection->prepare($query);
    $stmt -> bindParam(":image", $image);
    $stmt -> bindParam(":prix", $prix);
    $stmt -> bindParam(":surface", $surface);
    $stmt -> bindParam(":nb_chambres", $nb_chambres);
    $stmt -> bindParam(":description", $description);
    $stmt -> bindParam(":type_id", $type_id);
    $stmt -> bindParam(":quartier_id", $quartier_id);
    $stmt -> bindParam(":utilisateur_id", $utilisateur_id);
    $stmt->execute();

    $logement_id = $connection -> lastInsertId();

    foreach ($commerciaux_ids as $commercial_id) {
      insertLogementCommercial($logement_id, $commercial_id);
    }
}

function insertLogementCommercial(int $logement_id, int $commercial_id): void {
  global $connection;
  $query = "INSERT INTO logement_has_commercial (logement_id, commercial_id) VALUES (:logement_id, :commercial_id)";

  $stmt = $connection->prepare($query);
  $stmt -> bindParam(":logement_id", $logement_id);
  $stmt -> bindParam(":commercial_id", $commercial_id);
  $stmt->execute();
}

function deleteLogement(int $id): void {
    global $connection;
    $query = "DELETE FROM logement WHERE id = :id";

    $stmt = $connection->prepare($query);
    $stmt -> bindParam(":id", $id);
    $stmt->execute();
}
