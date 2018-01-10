<?php
require_once __DIR__ . "/../../config/parameters.php";
require_once __DIR__ . "/../security.php";
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="<?php echo $param['site_url'] ?>admin/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $param['site_url'] ?>admin/plugins/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo $param['site_url'] ?>admin/css/custom.css">
    </head>
    <body>

        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="<?php echo $param['site_url'] ?>admin/">Administration</a>
            <button class="navbar-toggler d-lg-none collapsed" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">

                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-circle"></i>
                            <?php echo $utilisateur["email"]; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">
                                <i class="fa fa-user"></i>
                                Profil
                            </a>
                            <a class="dropdown-item" href="<?php echo $param['site_url'] ?>admin/logout.php">
                                <i class="fa fa-sign-out"></i>
                                Déconnexion
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $param['site_url'] ?>index.php" class="nav-link">
                            <i class="fa fa-external-link"></i>
                            Front
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $param['site_url'] ?>admin/">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $param['site_url'] ?>admin/crud/evenement/">Evénements</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $param['site_url'] ?>admin/crud/type/">Types</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $param['site_url'] ?>admin/crud/formulaire/">Formulaires</a>
                        </li>
                    </ul>
                </nav>

                <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
