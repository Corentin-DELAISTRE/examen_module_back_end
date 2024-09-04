<?php

// Contrôleur : Affiche le résumé de la commande et les possibilités d'ajouter un menu/produit
// Paramètres : $_GET l'id de lacommande

// Initialisation
include_once "utils/init.php";
session_activation();
include_once "utils/verif_connexion.php";

// Verification du rôle de l'utilisateur : si il n'a pas le rôle "accueil" il est renvoyé a son tableau de bord
if(session_userconnected()->get("role") != "acc"){
    header('Location: afficher_tableau_de_bord.php');
    exit;
}

// Recupération de la commande en cours
$commande = new commande($_GET["id"]);
// Récupération des éléments de la commande
$item = new item();
$listeItem = $item->TargetedList("commande",$commande->id());

// Affichage du template du résumé de la commande
include_once "templates/pages/resume_commande.php";
