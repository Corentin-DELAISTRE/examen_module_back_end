<?php

// API : retourne sous format JSON la liste de tous les menus
// Paramètres : Néant

// Initialisation
include_once "utils/init.php";

// Traitement
// Récupération de tous les menus
$newMenu = new menu();
$listeMenus = $newMenu->listAll();


// Initialisation du tableau à retourner sous format JSON
$tabJSON = [];

// Pour chaque menu 
foreach ($listeMenus as $key => $menu) {
    $tabJSON[$key] = [
        "id" => $menu->id(),
        "nom" => $menu->getHTML("nom"),
        "prix" => $menu->getHTML("prix"),
        "image" => $menu->getHTML("image"),
    ];
}

echo json_encode($tabJSON);