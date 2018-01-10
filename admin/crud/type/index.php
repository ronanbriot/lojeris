<?php
require_once __DIR__ . "/../../../model/database.php";
require_once __DIR__ . "/../../layout/header.php";

$liste_types = getAllTypes();
?>

<h1>Gestion des types</h1>

<a href="insert_form.php" class="btn btn-primary">
    <i class="fa fa-plus"></i>
    Ajouter
</a>

<hr>

<table class="table table-striped">
    <thead class="thead-inverse">
        <tr>
            <th>Libelle</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($liste_types as $type) : ?>
        <tr>
            <td><?php echo $type["libelle"]; ?></td>
                <td><a href="delete_query.php?id=<?php echo $type["id"] ?>" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                    Supprimer
                </a>
                <a href="update_form.php?id=<?php echo $type["id"] ?>" class="btn btn-primary">
                    <i class="fa fa-edit"></i>
                    Modifier
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . "/../../layout/footer.php"; ?>
