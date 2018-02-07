<?php
require_once __DIR__ . "/../../../model/database.php";
require_once __DIR__ . "/../../layout/header.php";

$liste_logements = getAllLogements();
?>

<h1>Gestion des logements</h1>

<a href="insert_form.php" class="btn btn-primary">
    <i class="fa fa-plus"></i>
    Ajouter
</a>

<hr>

<table class="table table-striped">
    <thead class="thead-inverse">
        <tr>
            <th>Lieu</th>
            <th>Type</th>
            <th>Date</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($liste_logements as $logement) : ?>
        <tr>
            <td><?php echo $logement["libelle"]; ?></td>
                <td><?php echo $logement["type"]; ?></td>
                    <td><?php echo $logement["date_creation_format"]; ?></td>
                        <td><?php echo $logement["prix"]; ?> €</td>
            <td>
                <a href="delete_query.php?id=<?php echo $logement["id"] ?>" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                    Supprimer
                </a>
                <a href="update_form.php?id=<?php echo $logement["id"] ?>" class="btn btn-primary">
                    <i class="fa fa-edit"></i>
                    Modifier
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . "/../../layout/footer.php"; ?>
