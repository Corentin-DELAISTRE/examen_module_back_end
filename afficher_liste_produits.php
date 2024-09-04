<?php

// Contrôleur : Affiche la liste de tous les produits triés par catégorie
// Paramètres : Néant

// Initialisation
include_once "utils/init.php";
session_activation();
include_once "utils/verif_connexion.php";

// Verification du rôle de l'utilisateur : si il n'a pas le rôle "administrateur" il est renvoyé a son tableau de bord
if(session_userconnected()->get("role") != "adm"){
    header('Location: afficher_tableau_de_bord.php');
    exit;
}

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
include_once "templates/pages/liste_produits.php";