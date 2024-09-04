<?php 

// Contrôleur : Met à jour les informations de l'utilisateur dans la BDD, affiche un message de confirmation et redirige vers la liste des utilisateurs
// Paramètres : $_GET l'id de l'utilisateur
//              $_POST les nouvelles infos renseignées dans le formulaire de modification

// Initialisation
include_once "utils/init.php";
session_activation();
include_once "utils/verif_connexion.php";

// Verification du rôle de l'utilisateur : si il n'a pas le rôle "administrateur" il est renvoyé a son tableau de bord
if(session_userconnected()->get("role") != "adm"){
    header('Location: afficher_tableau_de_bord.php');
    exit;
}
// Récupération de l'utilisateur
$utilisateur = new utilisateur($_GET["id"]);

// Mise à jour des informations
$utilisateur->set("nom",$_POST["nom"]);
$utilisateur->set("prenom",$_POST["prenom"]);
$utilisateur->set("identifiant",$_POST["identifiant"]);
$utilisateur->set("role",$_POST["role"]);

// Si j'ai l'ancien mot de passe et le nouveau mot de passe qui sont renseignées
if(($_POST["ancien-mdp"] != "") && ($_POST["mdp"] != "")){
    // Vérification de l'exactitude de l'ancien mot de passe
    // La fonction verifMdp retourne true si le mot de passe passé en paramètres correspond sinon il retourne false
    if($utilisateur->verifMdp($_POST["ancien-mdp"]) == true){
        $utilisateur->set("mdp",password_hash($_POST["mdp"],PASSWORD_DEFAULT));
    }
}

// Mise à jour des données dans la BDD
$utilisateur->update();

// Affichage du message de confirmation
include_once "templates/pages/message_et_redirection.php";