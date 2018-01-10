<?php
require_once __DIR__ . "/../../../model/database.php";
require_once __DIR__ . "/../../layout/header.php";

$liste_formulaires = getAllFormulairesByUtilisateur($utilisateur["id"]);
?>

<h1>Gestion des formulaires</h1>

<table class="table table-striped">
    <thead class="thead-inverse">
        <tr>
            <th>Mariage</th>
            <th>Nom Prénom</th>
            <th>Email</th>
            <th>Nb Personnes</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($liste_formulaires as $formulaire) : ?>
        <tr>
            <td><?php echo $formulaire["evenement_lieu"]; ?></td>
            <td><?php echo $formulaire["nom_prenom"]; ?></td>
            <td><?php echo $formulaire["email"]; ?></td>
            <td><?php echo $formulaire["nb_personnes"]; ?></td>
            <td>
                <a href="delete_query.php?id=<?php echo $formulaire["id"] ?>" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                    Supprimer
                </a>
                <a href="show.php?id=<?php echo $formulaire["id"] ?>" class="btn btn-primary">
                    <i class="fa fa-eye"></i>
                    Afficher
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . "/../../layout/footer.php"; ?>