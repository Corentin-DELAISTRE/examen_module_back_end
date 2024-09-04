<?php
/*
Code à inclure dans les contrôleurs qui ont besoin de la connexion
Vérifie si un utilisateur est connecté. Sinon, redirection à la page indiquée
*/

// Vérifier si l'utilisateur est connecté
if (!session_isconnected()) {
    // Si non connecté, rediriger vers la page d'accueil
    include_once "templates/pages/ecran_de_connexion.php";
}
?>