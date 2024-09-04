<?php
// Classe taille : gestion des objets taille

class taille extends _lambda { 

    // Nom de la table
    protected $table = "taille";
    
    protected function define() {
        // Création des champs
        $this->addField("libelle", "TEXT", "Libelle");
    }

    // METHODES DE LA CLASSE
}