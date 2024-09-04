<?php
// Classe composition : gestion des objets composition

class composition extends _lambda { 

    // Nom de la table
    protected $table = "composition";
    
    protected function define() {
        // Création des champs
        $this->addField("menu", "LINK", "Menu","menu");
        $this->addField("taille", "LINK", "Taille", "taille");
        $this->addField("accompagnement", "TEXT", "Accompagnement");
        $this->addField("boisson", "LINK", "Boisson", "produit");
        $this->addField("sauce", "LINK", "Sauce", "produit");
        $this->addField("prix", "NUMBER", "Prix");
    }

    // METHODES DE LA CLASSE
}