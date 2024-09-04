<?php
/*
Fonctions de gestion de la session

- Si l'utilisateur n'est pas connecté, $_SESSION["id"] contient 0.
- Si l'utilisateur est connecté, $_SESSION["id"] contient l'id de l'utilisateur.
- L'objet associé à l'utilisateur connecté est stocké dans la variable globale $utilisateurConnecte.
*/

function session_activation() {
    // Rôle : acrtive le mécanisme de session
    // paramètres : aucun
    // retour : true si on est connecté, false sinon

    // démarrer le mécanisme
    session_start();



    // Si un utilisateur est connecté :
    if (session_isconnected()) {
        //   - charger l'objet utilisateur connecté 
        global $utilisateurConnecte;
        $utilisateurConnecte = new utilisateur(session_idconnected());
        //   - vérifier qu'il est actif, encore autorisé, etc....
        // ....
    }
    // Retourner si on est connecté ou pas
    return session_isconnected();

}


function session_isconnected() {
    // Rôle : dire si il y a une connexion active ou pas
    // Paramètres : néant
    // Retour : l'objet "utilisateur connecté" si on est connect, false sinon

    return ! empty($_SESSION["id"]);
}

 function session_idconnected() {
    // Rôle : donné l'id de l'utilisateur connexté
    // Paramètres : néant
    // Retour : l'id ou 0

    if (session_isconnected()) {
        return $_SESSION["id"]; 
    } else {
        return 0;
    }

 }

 function session_userconnected() {
    // Rôle : donné l'objet correspondant à l'utilisateur connecté
    // Paramètres : néant
    // Retour : un objet de la classe qui gère les utilisateurs de l'appli

    if (session_isconnected()) {
        global $utilisateurConnecte;
        return $utilisateurConnecte;
    } else {
        return new utilisateur();
    }


 }

 function session_deconnect() {
    // Rôle : déconnecter la session courante
    // paramètres : néant
    // Retour : true

    $_SESSION["id"] = 0;
 }

 function session_connect($id) {
    // Rôle : connecter un utilisateur
    // paramètres :
    //      $id : id de l'utilisateur connecté
    //      $typeCompte le type de compte de l'utilisateur "artiste" ou "organisateur"
    // Retour : true

    $_SESSION["id"] = $id;
 }
?>
