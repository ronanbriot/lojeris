<?php
/**
 * Recuperer la liste des logements
 * @return array Liste des logements
 */

function getAllLogements() : array {
    $liste_logements[0] = [
    "titre" => "Gare sud",
    "prix" => 345000,
    "dateCreation" => new DateTime("2017-06-12"),
    "type" => "Appartement",
    "taille" => 320,
    "nb_chambre" => 2,
    "image" => "property-01.jpg"
];

$liste_logements[1] = [
    "titre" => "Brequigny",
    "prix" => 345000,
    "dateCreation" => new DateTime("2017-08-12"),
    "type" => "Maison",
    "taille" => 220,
    "nb_chambre" => 3,
    "image" => "property-02.jpg"
];

$liste_logements[2] = [
    "titre" => "Paris",
    "prix" => 348000,
    "dateCreation" => new DateTime("2017-09-12"),
    "type" => "Maison",
    "taille" => 280,
    "nb_chambre" => 2,
    "image" => "property-03.jpg"
];
return $liste_logements;
}
