<?php

// Contrôleur : Ajoute l'utilisateur dans la BDD, affiche un message de confirmation et redirige vers la liste des utilisateurs
// Paramètres : $_POST les informations renseignées dans le formulaire de création

// Initialisation
include_once "utils/init.php";
session_activation();
include_once "utils/verif_connexion.php";

// Verification du rôle de l'utilisateur : si il n'a pas le rôle "administrateur" il est renvoyé a son tableau de bord
if(session_userconnected()->get("role") != "adm"){
    header('Location: afficher_tableau_de_bord.php');
    exit;
}

// Initialisation d'un nouvel utilisateur
$utilisateur = new utilisateur();
// Assignation des informations
$utilisateur->set("nom",$_POST["nom"]);
$utilisateur->set("prenom",$_POST["prenom"]);
$utilisateur->set("identifiant",$_POST["identifiant"]);
$utilisateur->set("mdp",password_hash($_POST["mdp"],PASSWORD_DEFAULT));
$utilisateur->set("role",$_POST["role"]);

// Insertion dans la BDD
$utilisateur->insert();

// Affichage du message de confirmation
include_once "templates/pages/message_et_redirection.php";