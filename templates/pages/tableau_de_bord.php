<?php

// Template affichant les fonctionnalités disponible selon le rôle de l’utilisateur
// Paramètres : le rôle de l'utilisateur

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Tableau de bord</title>
</head>
<body>
    <header class="flexwrap align-center spacebetween mb128">
        <div class="flexwrap g16">
            <div class="user-icon"><img src="/assets//images/background_et_icones/user_icon.png" alt="responsive-img"></div>
            <h2><?= session_userconnected()->getHTML("prenom") ?> <?= session_userconnected()->getHTML("nom") ?></h2>
        </div>
        <a href="deconnecter.php">Deconnexion</a>
    </header>
    <main class="pl64 pr64">

        <?php if (session_userconnected()->get("role") == "acc") { 
            include_once "templates/fragments/fonctionnalites_accueil.php";
         } ?>

        <?php if (session_userconnected()->get("role") == "pre") { 
            include_once "templates/fragments/fonctionnalites_preparateur.php";
         } ?>
        <?php if (session_userconnected()->get("role") == "adm") { 
            include_once "templates/fragments/fonctionnalites_admin.php";
         } ?>
    </main>

</body>

</html>