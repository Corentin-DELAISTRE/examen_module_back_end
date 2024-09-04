<?php
// Classe produit : gestion des objets produit

class produit extends _lambda { 

    // Nom de la table
    protected $table = "produit";
    
    protected function define() {
        // Création des champs
        $this->addField("nom", "TEXT", "Nom du produit");
        $this->addField("categorie", "LINK", "Catégorie","categorie");
        $this->addField("description", "TEXT", "Description du produit");
        $this->addField("prix", "NUMBER", "Prix du produit");
        $this->addField("image", "TEXT", "Illustration du produit");
        $this->addField("stock", "NUMBER", "Quantité en stock");
    }

    // METHODES DE LA CLASSE
}