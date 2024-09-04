<?php

// Contrôleur : Connecte l’utilisateur à la session et affiche son tableau de bord avec les fonctionnalités liées à son rôle
// Paramètres : $_POST  →  l’identifiant et le mot de passe renseigné dans le formulaire de connexion

// Initialisation
include_once "utils/init.php";

// Traitement
// Initialisation d'un objet utilisateur
$utilisateur = new utilisateur();

// Vérifie si les identifiant son corrects
$verif = $utilisateur->verifCompte($_POST["identifiant"],$_POST["mdp"]);

// Si ils sont érronés
if($verif === false){
    // Renvoi à l'écran de connexion
    include_once "templates/pages/ecran_de_connexion.php";
// Sinon
}else{
    // Activation du mécanisme de session, connexion de l'utilisateur à la session et affichage du tableau de bord
    session_activation();
    session_connect($utilisateur->id());
    header('Location: afficher_tableau_de_bord.php');
}