<?php
require_once __DIR__ . "/../../../model/database.php";
require_once __DIR__ . "/../../layout/header.php";

$liste_evenements = getAllMariagesByUtilisateur($utilisateur["id"]);
?>

<h1>Gestion des événements</h1>

<a href="insert_form.php" class="btn btn-primary">
    <i class="fa fa-plus"></i>
    Ajouter
</a>

<hr>

<table class="table table-striped">
    <thead class="thead-inverse">
        <tr>
            <th>Date</th>
            <th>Lieu</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($liste_evenements as $evenement) : ?>
        <tr>
            <td><?php echo $evenement["date_evenement"]; ?></td>
            <td><?php echo $evenement["lieu"]; ?></td>
            <td>
                <a href="delete_query.php?id=<?php echo $evenement["id"] ?>" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                    Supprimer
                </a>
                <a href="update_form.php?id=<?php echo $evenement["id"] ?>" class="btn btn-primary">
                    <i class="fa fa-edit"></i>
                    Modifier
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . "/../../layout/footer.php"; ?>