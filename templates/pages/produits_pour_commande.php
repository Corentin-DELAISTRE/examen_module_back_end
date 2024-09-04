<?php

// Template : Formulaire d'ajout d'un produit à une commande
// Paramètres : - un objet "commande"
//              - plusieurs listes d'objets "produit" (une liste par catégorie de produit)

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Sélectionner un produit</title>
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
        <h1 class="mb128">Choisir un produit</h1>
        <form action="ajouter_produit_commande.php?id=<?= $commande->id() ?>" method="post" class="addProduitCommande-form cont1200 p32 flexwrap g32 mb128">
            <!-- Burgers -->
            <fieldset class="flexwrap g32 p16 w100">
                <legend>Burgers</legend>
                <?php foreach ($listeBurgers as $burger) { ?>
                    <label class="form-option flexwrap justcenter align-end">
                        <div class="form-option-img w100"><img src="/assets/images<?= $burger->getHTML("image") ?>" class="responsive-img"></div>
                        <b class="w100 textcenter"><?= $burger->getHTML("nom") ?></b>
                        <input type="radio" name="produit" value="<?= $burger->id() ?>">
                    </label>
                <?php } ?>
            </fieldset>
            <!-- Boissons -->
            <fieldset class="flexwrap g32 p16 w100">
                <legend>Boissons</legend>
                <?php foreach ($listeBoissons as $boisson) { ?>
                    <label class="form-option flexwrap justcenter align-end">
                        <div class="form-option-img w100"><img src="/assets/images<?= $boisson->getHTML("image") ?>" class="responsive-img"></div>
                        <b class="w100 textcenter"><?= $boisson->getHTML("nom") ?></b>
                        <input type="radio" name="produit" value="<?= $boisson->id() ?>">
                    </label>
                <?php } ?>
            </fieldset>
            <!-- Accompagnements -->
            <fieldset class="flexwrap g32 p16 w100">
                <legend>Accompagnements</legend>
                <?php foreach ($listeAccompagnements as $accomp) { ?>
                    <label class="form-option flexwrap justcenter align-end">
                        <div class="form-option-img w100"><img src="/assets/images<?= $accomp->getHTML("image") ?>" class="responsive-img"></div>
                        <b class="w100 textcenter"><?= $accomp->getHTML("nom") ?></b>
                        <input type="radio" name="produit" value="<?= $accomp->id() ?>">
                    </label>
                <?php } ?>
            </fieldset>
            <!-- Encas -->
            <fieldset class="flexwrap g32 p16 w100">
                <legend>Encas</legend>
                <?php foreach ($listeEncas as $encas) { ?>
                    <label class="form-option flexwrap justcenter align-end">
                        <div class="form-option-img w100"><img src="/assets/images<?= $encas->getHTML("image") ?>" class="responsive-img"></div>
                        <b class="w100 textcenter"><?= $encas->getHTML("nom") ?></b>
                        <input type="radio" name="produit" value="<?= $encas->id() ?>">
                    </label>
                <?php } ?>
            </fieldset>
            <!-- Desserts -->
            <fieldset class="flexwrap g32 p16 w100">
                <legend>Desserts</legend>
                <?php foreach ($listeDesserts as $dessert) { ?>
                    <label class="form-option flexwrap justcenter align-end">
                        <div class="form-option-img w100"><img src="/assets/images<?= $dessert->getHTML("image") ?>" class="responsive-img"></div>
                        <b class="w100 textcenter"><?= $dessert->getHTML("nom") ?></b>
                        <input type="radio" name="produit" value="<?= $dessert->id() ?>">
                    </label>
                <?php } ?>
            </fieldset>
            <!-- Sauces -->
            <fieldset class="flexwrap g32 p16 w100">
                <legend>Sauces</legend>
                <?php foreach ($listeSauces as $sauce) { ?>
                    <label class="form-option flexwrap justcenter align-end">
                        <div class="form-option-img w100"><img src="/assets/images<?= $sauce->getHTML("image") ?>" class="responsive-img"></div>
                        <b class="w100 textcenter"><?= $sauce->getHTML("nom") ?></b>
                        <input type="radio" name="produit" value="<?= $sauce->id() ?>">
                    </label>
                <?php } ?>
            </fieldset>
            <!-- Salade -->
            <fieldset class="flexwrap g32 p16 w100">
                <legend>Salades</legend>
                <?php foreach ($listeSalades as $salade) { ?>
                    <label class="form-option flexwrap justcenter align-end">
                        <div class="form-option-img w100"><img src="/assets/images<?= $salade->getHTML("image") ?>" class="responsive-img"></div>
                        <b class="w100 textcenter"><?= $salade->getHTML("nom") ?></b>
                        <input type="radio" name="produit" value="<?= $salade->id() ?>">
                    </label>
                <?php } ?>
            </fieldset>
            <!-- Wrap -->
            <fieldset class="flexwrap g32 p16 w100">
                <legend>Wraps</legend>
                <?php foreach ($listeWraps as $wrap) { ?>
                    <label class="form-option flexwrap justcenter align-end">
                        <div class="form-option-img w100"><img src="/assets/images<?= $wrap->getHTML("image") ?>" class="responsive-img"></div>
                        <b class="w100 textcenter"><?= $wrap->getHTML("nom") ?></b>
                        <input type="radio" name="produit" value="<?= $wrap->id() ?>">
                    </label>
                <?php } ?>
            </fieldset>
            <!-- Quantité -->
            <fieldset class="flexwrap g32 p16 w100">
                <legend>Choisissez la quantité du produit</legend>
                    <label class="form-option flexwrap justcenter align-end">
                        <input type="number" name="quantite" value="1" class="pl8">
                    </label>
            </fieldset>
            <!-- Soumission -->
            <input type="submit" value="Ajouter le produit à la commande" class="mlra">
        </form>
    </main>
    <script src="/scripts/verif_form_ajout_produit_commande.js"></script>
</body>

</html>