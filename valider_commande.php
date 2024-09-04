<?php

// Contrôleur : Passe le statut de la commande en "en attente" et affiche un message de confirmation et redirige vers le tableau de bord
// Paramètres : $_GET l'id de la commande

// Initialisation
include_once "utils/init.php";
session_activation();
include_once "utils/verif_connexion.php";

// Verification du rôle de l'utilisateur : si il n'a pas le rôle "accueil" il est renvoyé a son tableau de bord
if(session_userconnected()->get("role") != "acc"){
    header('Location: afficher_tableau_de_bord.php');
    exit;
}

// Récupération de la commande
$commande = new commande($_GET["id"]);
// Changement du statut et mise à jour de la date
$commande->set("statut","att");
$commande->set("date",date("Y-m-d H:i:s"));
$commande->update();

// Message de confirmation
include_once "templates/pages/message_et_redirection.php";