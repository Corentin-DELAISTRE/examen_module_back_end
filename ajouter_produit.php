<?php

// Contrôleur : Ajoute un produit dans la BDD , affiche un message de confirmation et redirige vers la liste des produits
// Paramètres : $_POST les informations renseignées dans le formulaires de création
//              $_FILES l'illustration renseignée dans le formulaire de modification

// Initialisation
include_once "utils/init.php";
session_activation();
include_once "utils/verif_connexion.php";

// Verification du rôle de l'utilisateur : si il n'a pas le rôle "administrateur" il est renvoyé a son tableau de bord
if(session_userconnected()->get("role") != "adm"){
    header('Location: afficher_tableau_de_bord.php');
    exit;
}

// Initialisation du produit
$produit = new produit();
// Assignatin des informations
$produit->set("nom",$_POST["nom"]);
$produit->set("categorie",$_POST["categorie"]);
$produit->set("description",$_POST["description"]);
$produit->set("prix",$_POST["prix"]);
$produit->set("stock",$_POST["stock"]);
$produit->uploadIllustrationProduit($_FILES["illustration"]);


// INsertion dans la BDD
$produit->insert();

// Affichage du message de confirmation
include_once "templates/pages/message_et_redirection.php";