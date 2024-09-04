<?php

// Template : Affiche une demande de confirmation de suppression de l'utilisateur
// Paramètres : un objet utilisateur

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Demande de confirmation de suppression d'un utilisateur</title>
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

    <main class="flexwrap g24 pl64 pr64 mb128 justcenter align-center flexcolumn">
        <h1 class="w100 mb32 textcenter">Voulez vous supprimer <?=$utilisateur->getHTML("prenom")?> <?=$utilisateur->getHTML("nom")?> ?</h1>

        <div class="flexwrap g24">
            <a href="supprimer_utilisateur.php?id=<?= $utilisateur->id() ?>" class="action-btn">Oui</a>
            <a href="afficher_liste_utilisateurs.php" class="action-btn">Non</a>
        </div>
    </main>
</body>

</html>