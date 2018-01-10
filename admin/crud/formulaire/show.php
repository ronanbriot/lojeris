<?php
require_once __DIR__ . "/../../../model/database.php";

$id = $_GET["id"];
$formulaire = getFormulaire($id);
$liste_deroules = getAllDeroulesByFormulaire($id);

require_once __DIR__ . "/../../layout/header.php";
?>

<h1>Formulaire de <?php echo $formulaire["nom_prenom"] ?></h1>

<table class="table">
    <tbody>
        <tr>
            <th class="table-dark">Mariage</th>
            <td><?php echo $formulaire["evenement_lieu"]; ?></td>
        </tr>
        <tr>
            <th class="table-dark">Nom Prénom</th>
            <td><?php echo $formulaire["nom_prenom"]; ?></td>
        </tr>
        <tr>
            <th class="table-dark">Email</th>
            <td><?php echo $formulaire["email"]; ?></td>
        </tr>
        <tr>
            <th class="table-dark">Nb Personnes</th>
            <td><?php echo $formulaire["nb_personnes"]; ?></td>
        </tr>
        <tr>
            <th class="table-dark">Déroulés</th>
            <td>
                <ul>
                    <?php foreach ($liste_deroules as $deroule) : ?>
                        <li><?php echo $deroule["titre"]; ?></li>
                    <?php endforeach; ?>
                </ul>
            </td>
        </tr>
        <tr>
            <th class="table-dark">Message</th>
            <td><?php echo $formulaire["message"]; ?></td>
        </tr>
    </tbody>
</table>

<?php require_once __DIR__ . "/../../layout/footer.php"; ?>