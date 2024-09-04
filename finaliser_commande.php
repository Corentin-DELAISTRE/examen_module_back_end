<?php

// Contrôleur : Passe le statut de la commande en "préparée", affiche un message de confirmation et redirige vers la liste des commande à préparer.
// Paramètres : $_GET l'id de la commande

// Initialisation
include_once "utils/init.php";
session_activation();
include_once "utils/verif_connexion.php";

// Verification du rôle de l'utilisateur : si il n'a pas le rôle "preparateur" il est renvoyé a son tableau de bord
if(session_userconnected()->get("role") != "pre"){
    header('Location: afficher_tableau_de_bord.php');
    exit;
}

// Récupération de la commande
$commande = new commande($_GET["id"]);
// Mise à jour de son statut et de sa date
$commande->set("statut","pre");
$commande->set("date",date("Y-m-d H:i:s"));
$commande->update();

// Affiche le message de confirmation
include_once "templates/pages/message_et_redirection.php";