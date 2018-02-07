<?php
require_once __DIR__ . "/../../../model/database.php";

$liste_types = getAllTypes();
$liste_quartiers = getAllQuartiers();
$liste_commerciaux = getAllCommerciaux();


require_once __DIR__ . "/../../layout/header.php";
?>

<h1>Ajouter un logement</h1>

<form action="insert_query.php" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label>Lieu</label>
        <select name="quartier_id" class="form-control">
            <?php foreach ($liste_quartiers as $quartier) : ?>
                <option value="<?php echo $quartier["id"] ?>">
                    <?php echo $quartier["libelle_complet"] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Types</label>
        <select name="type_id" class="form-control">
            <?php foreach ($liste_types as $type) : ?>
                <option value="<?php echo $type["id"] ?>">
                    <?php echo $type["libelle"] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Commerciaux</label>
        <select name="commerciaux_ids[]" multiple class="form-control">
            <?php foreach ($liste_commerciaux as $commercial) : ?>
                <option value="<?php echo $commercial["id"] ?>">
                    <?php echo $commercial["nom_prenom"] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image" accept="image/*" class="form-control">
    </div>

    <div class="form-group">
        <label>Prix</label>
        <input type="number" name="prix" class="form-control">
    </div>

    <div class="form-group">
        <label>Surface</label>
        <input type="number" name="surface" class="form-control" min="0">
    </div>

    <div class="form-group">
        <label>Nombre de chambres</label>
        <input type="number" name="nb_chambres" class="form-control" min="0">
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">
        <i class="fa fa-check"></i>
        Enregistrer
    </button>
</form>

<?php require_once __DIR__ . "/../../layout/footer.php"; ?>
