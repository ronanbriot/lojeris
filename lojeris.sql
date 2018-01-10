USE lojeris;

SELECT
	CONCAT(ville.libelle, ' - ', quartier.libelle) AS libelle,
	logement.prix,
    logement.image,
    logement.surface,
    logement.nb_chambres,
    logement.date_creation,
    DATE_FORMAT(logement.date_creation, '%d/%m/%Y') AS date_creation_fromat,
    quartier.libelle AS quartier,
    ville.libelle AS ville,
    type.libelle AS type
FROM logement
INNER JOIN type ON type.id = logement.type_id
INNER JOIN quartier ON quartier.id = logement.quartier_id
INNER JOIN ville ON ville.id = quartier.ville_id
ORDER BY logement.date_creation;

SELECT
	CONCAT(ville.libelle, ' - ', quartier.libelle) AS libelle,
	logement.prix,
    logement.description,
    logement.image,
    logement.surface,
    logement.nb_chambres,
    logement.date_creation,
    DATE_FORMAT(logement.date_creation, '%d/%m/%Y') AS date_creation_fromat,
    quartier.libelle AS quartier,
    ville.libelle AS ville,
    type.libelle AS type
FROM logement
INNER JOIN type ON type.id = logement.type_id
INNER JOIN quartier ON quartier.id = logement.quartier_id
INNER JOIN ville ON ville.id = quartier.ville_id
WHERE logement.id = 1;

SELECT
	image.id,
    image.fichier,
    image.alt
FROM image
WHERE image.logement_id =1;

SELECT SHA1('pjehan');
    