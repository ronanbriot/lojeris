<?php
$liste_logements[0] = [
    "titre" => "Gare sud",
    "prix" => 345000,
    "dateCreation" => new DateTime("2017-06-12"),
    "type" => "Appartement",
    "taille" => 320,
    "nb_chambre" => 2,
    "image" => "property-01.jpg"
];

$liste_logements[1] = [
    "titre" => "Brequigny",
    "prix" => 345000,
    "dateCreation" => new DateTime("2017-08-12"),
    "type" => "Maison",
    "taille" => 220,
    "nb_chambre" => 3,
    "image" => "property-02.jpg"
];

$liste_logements[2] = [
    "titre" => "Paris",
    "prix" => 348000,
    "dateCreation" => new DateTime("2017-09-12"),
    "type" => "Maison",
    "taille" => 280,
    "nb_chambre" => 2,
    "image" => "property-03.jpg"
];

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Lojeris</title>
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <header class="site-header">
            <div class="cta-header">
                <div class="container">
                    <ul class="cta-contact inline-list">
                        <li>Téléphone : <a href="tel:0123456789">0123456789</a></li>
                        <li>Email : <a href="mailto:contact@lojeris.fr">contact@lojeris.fr</a></li>
                    </ul>
                    <div class="cta-social">
                        <ul class="inline-list">
                            <li>
                                <a href="http://www.facebook.com">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="http://www.twitter.com">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container main-header">
                <a href="index.html" class="logo">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-home fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
                <nav class="main-nav">
                    <ul>
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">Notre Agence</a></li>
                        <li><a href="#">Biens Immobiliers</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main>

            <header class="home-banner">
                <h1>Bienvenue chez <strong>Lojeris</strong></h1>
                <p>Votre partenaire de confiance en immobilier</p>
            </header>

            <section class="container">
                <h2>Nos dernières offres</h2>
                <div class="properties">
                    <?php                    foreach ($liste_logements as $logement) : ?>
                    <article class="property">
                        <a href="#">
                            <img src="images/<?php echo $logement["image"]; ?>" alt="">
                            <footer class="overlay">
                                <div class="info">
                                    <div class="tag <?php echo ($logement["prix"] < 346000) ? "reduc" : ""; ?>">
                                        <?php $prix = trim(strrev(chunk_split(strrev($logement["prix"]),3, ' '))); ?>
                                        <?php echo $prix; ?> €</div>
                                    <h3><?php echo $logement["titre"]; ?></h3>
                                </div>
                                <div class="more-info">
                                    <div class="property-info">
                                        <i class="fa fa-calendar"></i>
                                        <?php echo $logement["dateCreation"]->format("d/m/Y"); ?>
                                    </div>
                                    <div class="property-info">
                                        <i class="fa fa-tag"></i>
                                        <?php echo $logement["type"]; ?>
                                    </div>
                                    <div class="property-info">
                                        <i class="fa fa-expand"></i>
                                        <?php echo $logement["taille"]; ?>
                                    </div>
                                    <div class="property-info">
                                        <i class="fa fa-bed"></i>
                                        <?php echo $logement["nb_chambre"]; ?>
                                    </div>
                                </div>
                            </footer>
                        </a>
                    </article>
                    <?php                    endforeach; ?>
                </div>
            </section>

        </main>

        <footer class="site-footer">
            <div class="container">
                Copyright © 2013 Lojeris
            </div>
        </footer>

    </body>
</html>