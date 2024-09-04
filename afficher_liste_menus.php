<?php

// Contrôleur : Affiche la liste de tous les menus
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

// Récupération de la liste de tous les menus
$newMenu = new menu();
$listeMenus = $newMenu->listAll();

// Affichage du template
include_once "templates/pages/liste_menus.php";