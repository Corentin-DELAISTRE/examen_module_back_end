<?php

// Contrôleur : Affiche un message demandant de confirmer la livraison de la commande
// Paramètres : $_GET l'id de la commande

// Initialisation 
include_once "utils/init.php";
session_activation();
include_once "utils/verif_connexion.php";

// Verification du rôle de l'utilisateur : si il n'a pas le rôle "accueil" il est renvoyé a son tableau de bord
if(session_userconnected()->get("role") != "acc"){
    header('Location: afficher_tableau_de_bord.php');
    exit;
}

// Récupération de la commande
$commande = new commande($_GET["id"]);
// Récupération des éléments de la commande
$item = new item();
$listeItem = $item->TargetedList("commande",$commande->id());

// Affichage du template
include_once "templates/pages/demande_conf_livraison.php";