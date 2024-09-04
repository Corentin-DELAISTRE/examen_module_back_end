<?php 

// Template : Formulaire de création d'un menu pour l'assigner à une commande
// Paramètres : - un objet "commande"
//              - une liste d'objets "menu"
//              - une liste d'objets "taille"
//              - une liste d'objet "produits" de catégorie "boisson"
//              - une liste d'objet "produits" de catégorie "sauce"

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Composition du menu</title>
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
        <h1 class="mb128">Composition du menu</h1>
        <form action="ajouter_menu_commande.php?id=<?=$commande->id()?>" method="post" class="composition-form cont1200 p32 flexwrap g32 mb128">
            <!-- Menus -->
            <fieldset class="flexwrap g32 p16 w100">
                <legend>Sélectionnez votre menu</legend>
                <?php foreach ($menus as $menu) { ?>
                    <label class="form-option flexwrap justcenter align-end">
                        <div class="form-option-img w100"><img src="/assets/images<?= $menu->getHTML("image")?>" class="responsive-img"></div>
                        <b class="w100 textcenter"><?= $menu->getHTML("nom")?></b>
                        <input type="radio" name="menu" value="<?= $menu->id()?>">
                    </label>
                <?php } ?>
             </fieldset>
            <!-- Taille -->
             <fieldset class="flexwrap g32 p16 w100">
                <legend>Sélectionnez la taille du menu</legend>
                <?php foreach ($tailles as $taille) { ?>
                    <label class="form-option flexwrap justcenter align-end">
                        <div class="form-option-img w100"><img src="/assets/images/background_et_icones/illustration-best-of.png" class="responsive-img"></div>
                        <b class="w100 textcenter"><?= $taille->getHTML("libelle")?></b>
                        <input type="radio" name="taille" value="<?= $taille->id()?>">
                    </label>
                <?php } ?>
             </fieldset>
            <!-- Accompagnement -->
            <fieldset class="flexwrap g32 p16 w100">
                <legend>Sélectionnez l'accompagnement du menu</legend>
                    <label class="form-option flexwrap justcenter align-center">
                        <div class="form-option-img w100"><img src="/assets/images/frites/MOYENNE_FRITE.png" class="responsive-img"></div>
                        <b class="w100 textcenter">Frites</b>
                        <input type="radio" name="accompagnement" value="frites">
                    </label>
                    <label class="form-option flexwrap justcenter align-end">
                        <div class="form-option-img w100"><img src="/assets/images/frites/POTATOES.png" class="responsive-img"></div>
                        <b class="w100 textcenter">Potatoes</b>
                        <input type="radio" name="accompagnement" value="potatoes">
                    </label>
             </fieldset>
            <!-- Boisson -->
            <fieldset class="flexwrap g32 p16 w100">
                <legend>Sélectionnez la boisson du menu</legend>
                <?php foreach ($boissons as $boisson) { ?>
                    <label class="form-option flexwrap justcenter align-end">
                        <div class="form-option-img w100"><img src="/assets/images<?= $boisson->getHTML("image")?>" class="responsive-img"></div>
                        <b class="w100 textcenter"><?= $boisson->getHTML("nom")?></b>
                        <input type="radio" name="boisson" value="<?= $boisson->id()?>">
                    </label>
                <?php } ?>
             </fieldset>
            <!-- Sauce -->
            <fieldset class="flexwrap g32 p16 w100">
                <legend>Sélectionnez la boisson du menu</legend>
                <?php foreach ($sauces as $sauce) { ?>
                    <label class="form-option flexwrap justcenter align-end">
                        <div class="form-option-img w100"><img src="/assets/images<?= $sauce->getHTML("image")?>" class="responsive-img"></div>
                        <b class="w100 textcenter"><?= $sauce->getHTML("nom")?></b>
                        <input type="radio" name="sauce" value="<?= $sauce->id()?>">
                    </label>
                <?php } ?>
             </fieldset>
            <!-- Soumission -->
            <input type="submit" value="Ajouter le menu à la commande" class="mlra">
        </form>
    </main>
    <script src="/scripts/verif_form_creation_menu_commande.js"></script>
</body>
</html>