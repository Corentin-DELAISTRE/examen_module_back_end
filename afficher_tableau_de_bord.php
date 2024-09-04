<?php

// Contrôleur : Affiche le tableau de bord de l'utilisateur si il est déjà connecté à la session sinon renvoie à l’écran de connexion
// Paramètres : Néant

// Initialisation
include_once "utils/init.php";
session_activation();
include_once "utils/verif_connexion.php";

// Si le rôle de  l'utilisateur est "preparateur" alors on a besoin de la liste des commande à préparer (donc celle qui ont le statut "att")
if(session_userconnected()->get("role") == "pre"){
    $newCommande = new commande();
    $listeCommandes = $newCommande->getAllCommandesInOrder();
}

// Affichage du template
include_once "templates/pages/tableau_de_bord.php";