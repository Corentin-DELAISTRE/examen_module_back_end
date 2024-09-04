<?php

// API : retourne sous format JSON la liste de tous les produits
// Paramètres : Néant

// Initialisation
include_once "utils/init.php";

// Traitement
// Récupération de tous les produits
$newProduit = new produit();
$listeProduits = $newProduit->listAll();


// Initialisation du tableau à retourner sous format JSON
$tabJSON = [];

// Pour chaque produit 
foreach ($listeProduits as $key => $produit) {
    $tabJSON[$key] = [
        "id" => $produit->id(),
        "categorie" => $produit->getTarget("categorie")->getHTML("libelle"),
        "description" => $produit->getHTML("description"),
        "nom" => $produit->getHTML("nom"),
        "prix" => $produit->getHTML("prix"),
        "image" => $produit->getHTML("image"),
        "stock" => $produit->getHTML("stock"),
    ];
}

echo json_encode($tabJSON);