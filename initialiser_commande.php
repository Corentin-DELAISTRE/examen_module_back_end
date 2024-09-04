<?php

// Contrôleur : - Crée une nouvelle commande dans la BDD lui assigne le datetime actuel et le statut "initialisée"
//              - Affiche le template qui affiche le résumé de la commande et les possibilités d'ajouter un menu/produit
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

// Création de la commande
$commande = new commande();
// Assignation de la date et du statut
$commande->set("date",date("Y-m-d H:i:s"));
$commande->set("statut","ini");
// Insertion dans la BDD
$commande->insert();
// Récupération de l'id de la commande
$idCommande = $commande->id();

// Redirection vers le contrôleur affichant le résumé de la nouvelle commande en cours
header("Location: afficher_resume_commande.php?id=$idCommande");