<?php

// Contrôleur : Affiche le formulaire de création d'un utilisateur
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

// Affichage du template
include_once "templates/forms/form_ajout_utilisateur.php";