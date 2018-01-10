<?php
require_once __DIR__ . "/../../../model/database.php";

$liste_themes = getAllThemes();

require_once __DIR__ . "/../../layout/header.php";
?>

<h1>Ajouter un événement</h1>

<form action="insert_query.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Date</label>
        <input type="date" name="date_evenement" class="form-control">
    </div>
    <div class="form-group">
        <label>Lieu</label>
        <input type="text" name="lieu" class="form-control">
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image" accept="image/*" class="form-control">
    </div>
    <div class="form-group">
        <label>Thème</label>
        <select name="theme_id" class="form-control">
            <?php foreach ($liste_themes as $theme) : ?>
                <option value="<?php echo $theme["id"] ?>">
                    <?php echo $theme["titre"] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">
        <i class="fa fa-check"></i>
        Enregistrer
    </button>
</form>

<?php require_once __DIR__ . "/../../layout/footer.php"; ?>