<?php

// Contrôleur : Affiche un message demandant de confirmer la suppression de l'utilisateur
// Paramètres : $_GET l'id de l' utilisateur

// Initialisation
include_once "utils/init.php";
session_activation();
include_once "utils/verif_connexion.php";

// Verification du rôle de l'utilisateur : si il n'a pas le rôle "administrateur" il est renvoyé a son tableau de bord
if(session_userconnected()->get("role") != "adm"){
    header('Location: afficher_tableau_de_bord.php');
    exit;
}

// Récupération de l'utilisateur
$utilisateur = new utilisateur($_GET["id"]);

// Affichage du template
include_once "templates/pages/demande_conf_supp_utilisateur.php";