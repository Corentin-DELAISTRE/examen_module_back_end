<?php 

// Contrôleur : Affiche la liste des commandes préparées
// Paramètres : Néant

// Initialisation 
include_once "utils/init.php";
session_activation();
include_once "utils/verif_connexion.php";

// Verification du rôle de l'utilisateur : si il n'a pas le rôle "accueil" il est renvoyé a son tableau de bord
if(session_userconnected()->get("role") != "acc"){
    header('Location: afficher_tableau_de_bord.php');
    exit;
}

// Récupération des commandes préparées
$newCommande = new commande();
$listeCommandesPrep = $newCommande->getCommandesPrepInOrder();

// Affichage du template
include_once "templates/pages/liste_commandes_preparees.php";