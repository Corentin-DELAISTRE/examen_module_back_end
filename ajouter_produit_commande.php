<?php

// Contrôleur : Ajoute la quantité de produit désiré à la commande en cours et affiche le template du résumé de la commande
// Paramètres : $_GET l'id de la commande
//              $_POST les informations du produit à ajouter renseignées dans le formulaire d'ajout*

// Initialisation
include_once "utils/init.php";
session_activation();
include_once "utils/verif_connexion.php";

// Verification du rôle de l'utilisateur : si il n'a pas le rôle "accueil" il est renvoyé a son tableau de bord
if(session_userconnected()->get("role") != "acc"){
    header('Location: afficher_tableau_de_bord.php');
    exit;
}

// Traitement
// Récupération de la commande
$commande = new commande($_GET["id"]);

// Création d'un nouvel élément relié à la commande (item)
$item = new item();
// Assignation du produit et de sa quantité à l'élément
$item->set("commande",$commande->id());
$item->set("type","produit");
$item->set("produit",$_POST["produit"]);
$item->set("quantite",$_POST["quantite"]);

// Insertion de l'élément
$item->insert();

// Récupération de l'id de la commande
$idCommande = $commande->id();

// Redirection vers le contrôleur affichant le résumé de la commande en cours
header("Location: afficher_resume_commande.php?id=$idCommande");