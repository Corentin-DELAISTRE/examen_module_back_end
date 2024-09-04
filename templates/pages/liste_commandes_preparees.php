<?php

// Template : Affiche la liste des commande préparées
// Paramètres : une liste d'objets commande

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Commandes préparées</title>
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
        <div class="cont1200 flexwrap g24 mb128">
            <h1 class="mb24 w100">Liste des commandes à livrer</h1>
            <?php foreach ($listeCommandesPrep as $commande) {
                $item = new item();
                $listeItem = $item->TargetedList("commande", $commande->id()); ?>
                <div class="card-commande flexwrap flexcolumn spacebetween justecenter align-center g24 w100">

                    <h2>Commande n°<?= $commande->id() ?></h2>
                    <p>Le <?= $commande->datetimeToDate($commande->get("date")) ?> à <?= $commande->datetimeToHour($commande->get("date")) ?></p>

                    <?php if (isset($listeItem)) {
                        foreach ($listeItem as $item) { ?>
                            <div class="w100 flexwrap spacebetween">
                                <h4><?= $item->get("quantite") ?> x <?= $item->getNameItem() ?></h4>
                                <?php if ($item->get("type") == "composition") { ?>
                                    <ul class="w100 pl24">
                                        <li><?= $item->getNomAccompagnement() ?></li>
                                        <li><?= $item->getNomBoisson() ?></li>
                                        <li><?= $item->getNomSauce() ?></li>
                                    </ul>
                                <?php } ?>
                            </div>
                    <?php }
                    } ?>
                    <p class="prix-total-commande w100 fonctio-text">Total : <?= $commande->getPrixTotalCommande()?> €</p>
                    <a href="afficher_demande_conf_livraison.php?id=<?= $commande->id() ?>" class="action-btn">Livrer la commande</a>
                </div>
            <?php } ?>
        </div>
    </main>
</body>
</html>