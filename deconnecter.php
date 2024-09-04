<?php

// Contrôleur : Déconnecte l'utilisateur de la session et affiche l'écran de connexion
// Paramèters : Néant

// Initialisation 
include_once "utils/init.php";
session_activation();
include_once "utils/verif_connexion.php";

// Deconnexion de la session
session_deconnect();

// Affichage du template
include_once "templates/pages/ecran_de_connexion.php";