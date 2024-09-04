<?php

// Contrôleur : Affiche la liste de tous les utilisateurs triés via leur nom par ordre alphabétique
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

// Récupération de tous les utilisateurs
$newUtilisateur = new utilisateur();
$listeUtilisateurs = $newUtilisateur->listUsersOrderByName();

// Affichage du template
include_once "templates/pages/liste_utilisateurs.php";