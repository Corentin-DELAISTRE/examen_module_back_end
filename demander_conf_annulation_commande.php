<?php 

// Contrôleur : Affiche un message demandant de confirmer l’annulation de la commande
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

// Affichage du template
include_once "templates/pages/conf_annulation_commande.php";