<?php
require_once __DIR__ . "/../../../model/database.php";
require_once __DIR__ . "/../../layout/header.php";

$id = $_GET["id"];

$type = getOneType($id);
?>

<h1>Modifier un type</h1>

<form action="update_query.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Libellé</label>
        <input type="text" name="libelle" value="<?php echo $type["libelle"]; ?>" class="form-control">
    </div>

    <input type="hidden" name="id" value="<?php echo $type["id"]; ?>">
    <button type="submit" class="btn btn-success">
        <i class="fa fa-check"></i>
        Enregistrer
    </button>
</form>

<?php require_once __DIR__ . "/../../layout/footer.php"; ?>
