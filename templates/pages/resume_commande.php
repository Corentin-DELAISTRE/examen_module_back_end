<?php

// Template : affiche le résumé de la commande en cours et les possibilité d’ajout de menu/produit
// Paramètres : un objet commande 

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Résumé de la commande</title>
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

    <main class="flexwrap pr64 pl64">

        <div class="flexwrap flexcolumn align-center justcenter g32 w70">
            <a href="afficher_composition_pour_commande.php?id=<?=$commande->id()?>" class="fonctio-card flexwrap flexcolumn justcenter align-center p16 w40 g32">
                <div class="fonctio-icon w40"><img src="/assets/images/background_et_icones/gestion_menu.png" alt="" class="responsive-img"></div>
                <p class="fonctio-text">Ajouter un menu</p>
            </a>

            <a href="afficher_produits_pour_commande.php?id=<?=$commande->id()?>" class="fonctio-card flexwrap flexcolumn justcenter align-center p16 w40 g32">
                <div class="fonctio-icon w40"><img src="/assets/images/background_et_icones/ajouter_produit.png" alt="" class="responsive-img"></div>
                <p class="fonctio-text">Ajouter un produit</p>
            </a>
        </div>

        <div class="resume-commande flexwrap p32 g16 flexcolumn spacebetween w30">
            <div class="commande-items flexwrap g8">
                <h3 class="w100 textcenter mb24">Commande en cours :</h3>
                <?php if(isset($listeItem)){
                    foreach ($listeItem as $item) {?>
                        <div class="w100 flexwrap spacebetween ">
                            <h4><?=$item->get("quantite")?> x <?=$item->getNameItem()?></h4>
                            <h4><?=$item->getPrixItem()?> €</h4>
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
            </div>
            <div class="flexwrap g24">
                <p class="prix-total-commande textend w100 fonctio-text">Total : <?= $commande->getPrixTotalCommande()?> €</p>
                <div class="flexwrap g16 mlra">
                    <?php if($commande->getPrixTotalCommande() > 0){?>
                        <a href="valider_commande.php?id=<?=$commande->id()?>" class="action-btn">Valider commande</a>
                    <?php } ?>
                    <a href="demander_conf_annulation_commande.php?id=<?=$commande->id()?>" class="cancel-btn">Abandonner</a>
                </div>
            </div>
        </div>
    </main>

</body>

</html>