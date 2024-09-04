<?php

// Contrôleur : Affiche le formulaire pour mettre à jour les informations d'un produit
// Paramètres : $_GET l'id du produit

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
// Récupération de la liste de toute les catégories
$newCategorie = new categorie();
$listeCategories = $newCategorie->listAll();

// Affichage du template
include_once "templates/forms/form_modif_produit.php";