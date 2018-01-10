<?php
require_once __DIR__ . "/../../../model/database.php";

$id = $_GET["id"];
$evenement = getMariage($id);
$liste_themes = getAllThemes();

require_once __DIR__ . "/../../layout/header.php";
?>

<h1>Modifier un événement</h1>

<form action="update_query.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Date</label>
        <input type="date" name="date_evenement" value="<?php echo $evenement["date_evenement"]; ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Lieu</label>
        <input type="text" name="lieu" value="<?php echo $evenement["lieu"]; ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Image</label>
        <?php if (!empty($evenement["image"])) : ?>
            <img src="../../../images/<?php echo $evenement["image"]; ?>" class="img-thumbnail">
        <?php endif; ?>
        <input type="file" name="image" accept="image/*" class="form-control">
    </div>
    <div class="form-group">
        <label>Thème</label>
        <select name="theme_id" class="form-control">
            <?php foreach ($liste_themes as $theme) : ?>
                <?php $selected = ($evenement["theme_id"] == $theme["id"]) ? "selected" : ""; ?>
                <option value="<?php echo $theme["id"] ?>" <?php echo $selected; ?>>
                    <?php echo $theme["titre"] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <input type="hidden" name="id" value="<?php echo $evenement["id"]; ?>">
    <button type="submit" class="btn btn-success">
        <i class="fa fa-check"></i>
        Enregistrer
    </button>
</form>

<?php require_once __DIR__ . "/../../layout/footer.php"; ?>