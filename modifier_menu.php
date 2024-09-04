<?php

// Contrôleur : Met à jour les informations du menu dans la BDD , affiche un message de confirmation et redirige vers la liste des menus
// Paramètres : $_POST les informations renseignées dans le formulaires de modification
//              $_GET l'id du menu
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

// Récupération du menu 
$menu = new menu($_GET["id"]);
// Mise à jour des infos concernant ce menu
$menu->set("nom",$_POST["nom"]);
$menu->set("prix",$_POST["prix"]);
// Si j'ai une photo
if(!empty($_FILES["illustration"] && $_FILES["illustration"]["error"] == UPLOAD_ERR_OK)){
    $menu->uploadIllustrationMenu($_FILES["illustration"]);
}

// Mise à jour dans la BDD
$menu->update();

// Affichage du message de confirmation
include_once "templates/pages/message_et_redirection.php";