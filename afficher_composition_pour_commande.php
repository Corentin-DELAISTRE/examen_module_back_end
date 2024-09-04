<?php 

// Contrôleur : Affiche le formulaire de création d’une composition de menu pour une commande
// Paramètres : $_GET l'id de la commande,


// Initialisation 
include_once "utils/init.php";
session_activation();
include_once "utils/verif_connexion.php";

// Verification du rôle de l'utilisateur : si il n'a pas le rôle "accueil" il est renvoyé a son tableau de bord
if(session_userconnected()->get("role") != "acc"){
    header('Location: afficher_tableau_de_bord.php');
    exit;
}

// Traitement
// Récuperation de la commande
$commande = new commande($_GET["id"]);
// Récupération des menus
$newMenu = new menu();
$menus = $newMenu->listAll();
// Récupération des tailles
$newTaille = new taille();
$tailles = $newTaille->listAll();
// Récupération des boissons et des sauces
$newProduit = new produit();
$boissons = $newProduit->TargetedList("categorie",2);
$sauces = $newProduit->TargetedList("categorie",6);

// Affichage du template

include_once "templates/pages/composition_pour_commande.php";