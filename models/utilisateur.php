<?php
// Classe utilisateur : gestion des objets utilisateur

class utilisateur extends _lambda { 

    // Nom de la table
    protected $table = "utilisateur";
    
    protected function define() {
        // Création des champs
        $this->addField("nom", "TEXT", "Nom de l'utilisateur");
        $this->addField("prenom", "TEXT", "Prénom de l'utilisateur");
        $this->addField("identifiant", "TEXT", "Identifiant");
        $this->addField("mdp", "PASSWORD", "Mot de passe");
        $this->addField("role", "TEXT", "Rôle de l'utilisateur");
    }

    // METHODES DE LA CLASSE

    function listUsersOrderByName(){
        // Rôle : lister tous les utilisateurs triés via le nom par ordre alphabétique
        // Paramètres : aucun
        // Retourne : une liste d'objets utilisateur

        // Construction de la requête
        $sql = "SELECT `id`, ". $this->listChamps() . " FROM `$this->table` ORDER BY `nom` ASC";

        // Execution
        $liste = $this->sqlToList($sql);

        return $liste;
    }
}