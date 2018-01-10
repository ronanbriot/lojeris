<?php

function getAllImagesByLogement(int $id): array {
global $connection;
$query = "SELECT
	   image.id,
     image.fichier,
     image.alt
FROM image
WHERE image.logement_id = :id;";

$stmt = $connection->prepare($query);
$stmt->bindparam(":id", $id);
$stmt->execute();

return $stmt->fetchAll();
}

?>
