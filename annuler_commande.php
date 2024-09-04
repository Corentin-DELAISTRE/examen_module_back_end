<?php

// Contrôleur : Supprime la commande en cours d'élaboration et tous les éléments lui étant associés. Puis affiche le tableau de bord
// Paramètres : $_GET l'id de la commande en cours

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
// Récupération des éléments associés à la commande
$newItem = new item();
$itemsLies = $newItem->TargetedList("commande",$commande->id());

// Suppression de tous les items
foreach ($itemsLies as $item) {
    $item->delete();
}

// Suppression de la commande
$commande->delete();

// Affichage du message de confirmation de suppression
include_once "templates/pages/message_et_redirection.php";