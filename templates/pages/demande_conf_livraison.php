<?php

// Template :  Affiche un message demandant de confirmer la livraison de la commande
// Paramètres : un objet commande

?>
<?php 

// Template : Affiche un message demandant de confirmer la préparation de la commande
// Paramètres : - un objet comamande
//              - une liste d'objets item

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Confirmation de livraison</title>
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

    <main class="cont1200">
        <h1 class="mb24">Confirmer la livraison de la commande n° <?=$commande->id()?> ?</h1>
        <?php if(isset($listeItem)){
                    foreach ($listeItem as $item) {?>
                        <div class="w100 flexwrap spacebetween mb24">
                            <h4><?=$item->get("quantite")?> x <?=$item->getNameItem()?></h4>
                            <?php if($item->get("type") == "composition"){ ?>
                                <ul class="w100 pl24">
                                    <li><?= $item->getNomAccompagnement()?></li>
                                    <li><?= $item->getNomBoisson()?></li>
                                    <li><?= $item->getNomSauce()?></li>
                                </ul>
                            <?php } ?>
                        </div>
                        <?php }
                }?>
        <p class="prix-total-commande w100 fonctio-text mb24">Total : <?= $commande->getPrixTotalCommande()?> €</p>
        <div class="flexwrap g24">
            <a href="livrer_commande.php?id=<?=$commande->id()?>" class="action-btn">Oui</a>
            <a href="afficher_commandes_preparees.php" class="action-btn">Non</a>
        </div>
    </main>
</body>
</html>