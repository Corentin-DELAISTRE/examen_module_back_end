<?php
// Classe menu : gestion des objets menu

class menu extends _lambda { 

    // Nom de la table
    protected $table = "menu";
    
    protected function define() {
        // Création des champs
        $this->addField("nom", "TEXT", "Nom du menu");
        $this->addField("prix", "NUMBER", "Prix du menu");
        $this->addField("image", "TEXT", "Illustration du menu");
    }

    // METHODES DE LA CLASSE
}