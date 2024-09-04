<?php

// Contrôleur : Ajoute le menu dans la BDD, affiche un message de confirmation et redirige vers la liste des menus
// Paramètres : $_POST les infos du nouveau menu renseignées dans le formulaire de création
//              $FILES de l'illustration

// Initialisation
include_once "utils/init.php";
session_activation();
include_once "utils/verif_connexion.php";

// Verification du rôle de l'utilisateur : si il n'a pas le rôle "administrateur" il est renvoyé a son tableau de bord
if(session_userconnected()->get("role") != "adm"){
    header('Location: afficher_tableau_de_bord.php');
    exit;
}

// Traitement
// Création d'un nouveau menu
$newMenu = new menu();
// Assignation des informations
$newMenu->set("nom",$_POST["nom"]);
$newMenu->set("prix",$_POST["prix"]);
$newMenu->uploadIllustrationMenu($_FILES["illustration"]);

$newMenu->insert();

// Affichage du message de confirmation
 include_once "templates/pages/message_et_redirection.php";