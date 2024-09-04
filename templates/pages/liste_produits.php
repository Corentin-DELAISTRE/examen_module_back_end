<?php

// Template : Affiche la liste de tous les produits triés par catégorie
// Paramètres : un liste d'objet produit pour chaque catégorie

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Liste des produits</title>
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
        <h1 class="mb32 w100">Liste des produits</h1>
        <div class="w100 mb32">
            <a href="afficher_form_ajout_produit.php" class="action-btn">+ Ajouter un nouveau produit</a>
        </div>
        <!-- Burgers -->
        <h2 class="mb32 w100">Burgers</h2>
        <?php foreach ($listeBurgers as $burger) { ?>
            <div class="gestion-card w15 p16 flexwrap g16 justcenter align-center">
                <div class="gestion-card-img w80"><img src="/assets/images<?=$burger->getHTML("image")?>" class="responsive-img"></div>
                <h2 class="mb24 w100 textcenter"><?=$burger->get("nom")?></h2>
                <a href="afficher_form_modif_produit.php?id=<?=$burger->id()?>" class="gestion-action-btn">Modifier</a>
                <a href="afficher_demande_conf_supp_produit.php?id=<?=$burger->id()?>" class="gestion-suppr-btn">Supprimer</a>
            </div>
        <?php } ?>
        <!-- Boissons -->
        <h2 class="mb32 mt32 w100">Boissons</h2>
        <?php foreach ($listeBoissons as $boisson) { ?>
            <div class="gestion-card w15 p16 flexwrap g16 justcenter align-center">
                <div class="gestion-card-img w80"><img src="/assets/images<?=$boisson->getHTML("image")?>" class="responsive-img"></div>
                <h2 class="mb24 w100 textcenter"><?=$boisson->get("nom")?></h2>
                <a href="afficher_form_modif_produit.php?id=<?=$boisson->id()?>" class="gestion-action-btn">Modifier</a>
                <a href="afficher_demande_conf_supp_produit.php?id=<?=$boisson->id()?>" class="gestion-suppr-btn">Supprimer</a>
            </div>
        <?php } ?>
        <!-- Accompagnements -->
        <h2 class="mb32 mt32 w100">Accompagnements</h2>
        <?php foreach ($listeAccompagnements as $accomp) { ?>
            <div class="gestion-card w15 p16 flexwrap g16 justcenter align-center">
                <div class="gestion-card-img w80"><img src="/assets/images<?=$accomp->getHTML("image")?>" class="responsive-img"></div>
                <h2 class="mb24 w100 textcenter"><?=$accomp->get("nom")?></h2>
                <a href="afficher_form_modif_produit.php?id=<?=$accomp->id()?>" class="gestion-action-btn">Modifier</a>
                <a href="afficher_demande_conf_supp_produit.php?id=<?=$accomp->id()?>" class="gestion-suppr-btn">Supprimer</a>
            </div>
        <?php } ?>
        <!-- Encas -->
        <h2 class="mb32 mt32 w100">Encas</h2>
        <?php foreach ($listeEncas as $encas) { ?>
            <div class="gestion-card w15 p16 flexwrap g16 justcenter align-center">
                <div class="gestion-card-img w80"><img src="/assets/images<?=$encas->getHTML("image")?>" class="responsive-img"></div>
                <h2 class="mb24 w100 textcenter"><?=$encas->get("nom")?></h2>
                <a href="afficher_form_modif_produit.php?id=<?=$encas->id()?>" class="gestion-action-btn">Modifier</a>
                <a href="afficher_demande_conf_supp_produit.php?id=<?=$encas->id()?>" class="gestion-suppr-btn">Supprimer</a>
            </div>
        <?php } ?>
        <!-- Desserts -->
        <h2 class="mb32 mt32 w100">Desserts</h2>
        <?php foreach ($listeDesserts as $dessert) { ?>
            <div class="gestion-card w15 p16 flexwrap g16 justcenter align-center">
                <div class="gestion-card-img w80"><img src="/assets/images<?=$dessert->getHTML("image")?>" class="responsive-img"></div>
                <h2 class="mb24 w100 textcenter"><?=$dessert->get("nom")?></h2>
                <a href="afficher_form_modif_produit.php?id=<?=$dessert->id()?>" class="gestion-action-btn">Modifier</a>
                <a href="afficher_demande_conf_supp_produit.php?id=<?=$dessert->id()?>" class="gestion-suppr-btn">Supprimer</a>
            </div>
        <?php } ?>
        <!-- Sauces -->
        <h2 class="mb32 mt32 w100">Sauces</h2>
        <?php foreach ($listeSauces as $sauce) { ?>
            <div class="gestion-card w15 p16 flexwrap g16 justcenter align-center">
                <div class="gestion-card-img w80"><img src="/assets/images<?=$sauce->getHTML("image")?>" class="responsive-img"></div>
                <h2 class="mb24 w100 textcenter"><?=$sauce->get("nom")?></h2>
                <a href="afficher_form_modif_produit.php?id=<?=$sauce->id()?>" class="gestion-action-btn">Modifier</a>
                <a href="afficher_demande_conf_supp_produit.php?id=<?=$sauce->id()?>" class="gestion-suppr-btn">Supprimer</a>
            </div>
        <?php } ?>
        <!-- Salades -->
        <h2 class="mb32 mt32 w100">Salades</h2>
        <?php foreach ($listeSalades as $salade) { ?>
            <div class="gestion-card w15 p16 flexwrap g16 justcenter align-center">
                <div class="gestion-card-img w80"><img src="/assets/images<?=$salade->getHTML("image")?>" class="responsive-img"></div>
                <h2 class="mb24 w100 textcenter"><?=$salade->get("nom")?></h2>
                <a href="afficher_form_modif_produit.php?id=<?=$salade->id()?>" class="gestion-action-btn">Modifier</a>
                <a href="afficher_demande_conf_supp_produit.php?id=<?=$salade->id()?>" class="gestion-suppr-btn">Supprimer</a>
            </div>
        <?php } ?>
        <!-- Wraps -->
        <h2 class="mb32 mt32 w100">Wraps</h2>
        <?php foreach ($listeWraps as $wrap) { ?>
            <div class="gestion-card w15 p16 flexwrap g16 justcenter align-center">
                <div class="gestion-card-img w80"><img src="/assets/images<?=$wrap->getHTML("image")?>" class="responsive-img"></div>
                <h2 class="mb24 w100 textcenter"><?=$wrap->get("nom")?></h2>
                <a href="afficher_form_modif_produit.php?id=<?=$wrap->id()?>" class="gestion-action-btn">Modifier</a>
                <a href="afficher_demande_conf_supp_produit.php?id=<?=$wrap->id()?>" class="gestion-suppr-btn">Supprimer</a>
            </div>
        <?php } ?>
    </main>
</body>

</html>