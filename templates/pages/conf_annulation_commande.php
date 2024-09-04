<?php

// Template : Affiche un message demandant de confirmer l'annulation de la commande
// Paramètres : Néant

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Confirmation d'annulation</title>
</head>

<body>
    <header class="flexwrap align-center spacebetween mb64">
        <div class="flexwrap g16">
            <div class="user-icon"><img src="/assets//images/background_et_icones/user_icon.png" alt="responsive-img"></div>
            <h2><?= session_userconnected()->getHTML("prenom") ?> <?= session_userconnected()->getHTML("nom") ?></h2>
        </div>
        <div class="flexwrap g32">
            <a href="afficher_tableau_de_bord.php">Tableau de bord</a>
            <a href="deconnecter.php">Deconnexion</a>
        </div>
    </header>

    <main>
        <h1 class="textcenter mb24">Voulez-vous annuler la commande en cours ?</h1>
        <div class="flexwrap justcenter g24">
            <a href="annuler_commande.php?id=<?=$commande->id()?>" class="action-btn">Oui</a>
            <a href="afficher_resume_commande.php?id=<?=$commande->id()?>" class="action-btn">Non</a>
        </div>
    </main>
</body>
</html>