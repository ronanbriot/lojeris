<?php
require_once 'model/database.php';

$id = $_GET["id"];
$logement = getLogement($id);
$liste_images = getAllImagesByLogement($id);

$header["titre"] = $logement["libelle"];
$header["css"] = [
  "owlcarousel/owl.carousel.min.css",
  "owlcarousel/owl.theme.default.min.css"
];

require_once 'layout/header.php';?>

<section class="container">
    <h1><?php echo $logement["libelle"]; ?></h1>
    <div class="owl-carousel">
    <img src="images/<?php echo $logement["image"] ?>" alt="">
    <?php foreach ($liste_images as $image) : ?>
      <img src="images/<?php echo $image["fichier"] ?>" alt="">
    <?php endforeach; ?>
    </div>
    <p>
      <?php echo $logement["description"]; ?>
    </p>
</section>

<?php
$footer["js"] = [
    "owlcarousel/owl.carousel.min.js"
];
require_once 'layout/footer.php';
?>
