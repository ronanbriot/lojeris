<?php

function getAllTypes(): array {
    global $connection;
    $query = "SELECT * FROM type";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}
