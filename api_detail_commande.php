<?php

// API : retourne sous format JSON le détail d'une commande
// Paramètres : $_GET l'id de la commande

// Initialisation
include_once "utils/init.php";

// Traitement
// Récupération de la commande
$commande = new commande($_GET["id"]);


// Initialisation du tableau à retourner sous format JSON
$tabJSON = [
    "id" => "",
    "date" => "",
    "menus" => [],
    "produits" => [],
    "prix_total" => "",
];

// Ajout de l'id de la date et du prix total de la commande
$tabJSON["id"] = $commande->id();
$tabJSON["date"] = $commande->getHTML("date");
$tabJSON["prix_total"] = $commande->getPrixTotalCommande();

// Récupération des éléments de la commande
$newItem = new item();
$itemsCommande = $newItem->TargetedList("commande",$commande->id());

// Pour chaque éléments
foreach ($itemsCommande as $item) {
    // Si c'est un menu
    if($item->getHTML("type") == "composition"){
        // J'ajoute l'élément dans le tableau menu de tabJSON
        $tabJSON["menus"] += [
            "nom" => $item->getNameItem(),
            "accompagnement" => $item->getNomAccompagnement(),
            "boisson" => $item->getNomBoisson(),
            "sauce" => $item->getNomSauce(),
            "quantite" => $item->getHTML("quantite"),
            "prix" => $item->getPrixItem(),
        ];
    // Sinon si c'est un produit
    }else if($item->getHTML("type") == "produit"){
        // J'ajoute l'élément dans le tableau produit de tabJSON
        $tabJSON["produits"] += [
            "nom" => $item->getNameItem(),
            "quantite" => $item->getHTML("quantite"),
            "prix" => $item->getPrixItem(),
        ];
    }
}

echo json_encode($tabJSON);