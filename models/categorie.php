<?php
// Classe categorie : gestion des objets categorie

class categorie extends _lambda { 

    // Nom de la table
    protected $table = "categorie";
    
    protected function define() {
        // Création du champ

        $this->addField("libelle", "TEXT", "Catégorie");
    }

    // METHODES DE LA CLASSE
}