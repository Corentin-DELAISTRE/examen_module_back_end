<?php

// Contrôleur : Supprime le produit de la BDD, affiche un message de confirmation et redirige vers la liste des produits
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

// Suppression du produit
$produit->delete();

// Affichage du message de confirmation
include_once "templates/pages/message_et_redirection.php";