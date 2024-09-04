<?php 

// Fragment : Affiche les fonctionnalités du tableau de bord pour un compte "preparateur"
// Paramètres : Néant

?>
<div class="cont1200 flexwrap g24">
    <h1 class="mb24 w100">Liste des commandes à préparer</h1>
    <?php foreach ($listeCommandes as $commande) {
        $item = new item();
        $listeItem = $item->TargetedList("commande",$commande->id());?>
        <div class="card-commande flexwrap flexcolumn spacebetween justecenter align-center g24 w100">

            <h2>Commande n°<?=$commande->id()?></h2>
            <p>Le <?= $commande->datetimeToDate($commande->get("date"))?> à <?= $commande->datetimeToHour($commande->get("date"))?></p>

            <?php if(isset($listeItem)){
                    foreach ($listeItem as $item) {?>
                        <div class="w100 flexwrap spacebetween">
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
            <a href="afficher_demande_conf_preparation.php?id=<?= $commande->id()?>" class="action-btn">Commande prête</a>
        </div>
    <?php } ?>
</div>