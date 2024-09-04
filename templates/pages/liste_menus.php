<?php

// Template : Affiche la liste de tous les menus
// Paramètres : une liste d'objet menu

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Liste des menus</title>
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

    <main class="flexwrap g24 pl64 pr64 mb128">
        <h1 class="mb32 w100">Liste des menus</h1>
        <div class="w100 mb32">
            <a href="afficher_form_ajout_menu.php" class="action-btn">+ Ajouter un nouveau menu</a>
        </div>
        <?php foreach ($listeMenus as $menu) { ?>
            <div class="gestion-card w15 p16 flexwrap g16 justcenter align-center">
                <div class="gestion-card-img w80"><img src="/assets/images<?=$menu->getHTML("image")?>" class="responsive-img"></div>
                <h2 class="mb24 w100 textcenter"><?=$menu->getHTML("nom")?></h2>
                <a href="afficher_form_modif_menu.php?id=<?=$menu->id()?>" class="gestion-action-btn">Modifier</a>
                <a href="afficher_demande_conf_supp_menu.php?id=<?=$menu->id()?>" class="gestion-suppr-btn">Supprimer</a>
            </div>
        <?php } ?>
    </main>
</body>

</html>