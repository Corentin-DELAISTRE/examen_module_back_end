<?php

//Fichier à inclure au début de tout les controleurs pour initialiser l'environnement
//GESTION DES MESSAGES D'ERREURS
ini_set("display_errors", 1);       // Aficher les erreurs
error_reporting(E_ALL);             // Toutes les erreurs

//OUVERTURES DE LA BASE DE DONNEES
global $bdd; //Les variables dans $GLOBALS["bdd"]

//On affecte la base de données à la variable globale
$bdd = new PDO("mysql:host=localhost;dbname=projets_exam-back_cdelaistre;charset=UTF8", "cdelaistre", "ai+SVn3c+T");
//Pour debugger,  on ajoute une propriété
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

// Chargement des classes
include_once "utils/_lambda.php";
include_once "utils/field.php";
include_once "models/categorie.php";
include_once "models/commande.php";
include_once "models/composition.php";
include_once "models/item.php";
include_once "models/menu.php";
include_once "models/produit.php";
include_once "models/projet.php";
include_once "models/taille.php";
include_once "models/utilisateur.php";

// chargement du mécanisme de session
include_once "utils/session.php";
