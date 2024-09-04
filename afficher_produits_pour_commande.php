<?php 

// Contrôleur : Affiche le formulaire pour sélectionner un produit pour la commande en cours
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

// Faire une liste pour chaque catégorie de produit
$newProduit = new produit();
$listeBurgers = $newProduit->TargetedList("categorie",1);
$listeBoissons = $newProduit->TargetedList("categorie",2);
$listeAccompagnements = $newProduit->TargetedList("categorie",3);
$listeEncas = $newProduit->TargetedList("categorie",4);
$listeDesserts = $newProduit->TargetedList("categorie",5);
$listeSauces = $newProduit->TargetedList("categorie",6);
$listeSalades = $newProduit->TargetedList("categorie",7);
$listeWraps = $newProduit->TargetedList("categorie",8);

// Affichage du template
include_once "templates/pages/produits_pour_commande.php";