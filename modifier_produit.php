<?php

// Contrôleur : Met à jour les informations du produit dans la BDD , affiche un message de confirmation et redirige vers la liste des produits
// Paramètres : $_POST les informations renseignées dans le formulaires de modification
//              $_GET l'id du produit
//              $_FILES la nouvelle illustration renseignée dans le formulaire de modification (facultatif)

// Initialisation
include_once "utils/init.php";
session_activation();
include_once "utils/verif_connexion.php";

// Verification du rôle de l'utilisateur : si il n'a pas le rôle "administrateur" il est renvoyé a son tableau de bord
if(session_userconnected()->get("role") != "adm"){
    header('Location: afficher_tableau_de_bord.php');
    exit;
}

// Récupération du produit 
$produit = new produit($_GET["id"]);
// Mise à jour des infos concernant ce produit
$produit->set("nom",$_POST["nom"]);
$produit->set("categorie",$_POST["categorie"]);
$produit->set("description",$_POST["description"]);
$produit->set("prix",$_POST["prix"]);
// Si j'ai une photo
if(!empty($_FILES["illustration"] && $_FILES["illustration"]["error"] == UPLOAD_ERR_OK)){
    $produit->uploadIllustrationProduit($_FILES["illustration"]);
}

// Mise à jour dans la BDD
$produit->update();

// Affichage du message de confirmation
include_once "templates/pages/message_et_redirection.php";