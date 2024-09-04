<?php
// Classe item : gestion des objets item

class item extends _lambda { 

    // Nom de la table
    protected $table = "item";
    
    protected function define() {
        // Création des champs
        $this->addField("commande", "LINK", "Commande","commande");
        $this->addField("type", "TEXT", "Type");
        $this->addField("produit","LINK","Produit","produit");
        $this->addField("composition","LINK","Composition","composition");
        $this->addField("quantite", "NUMBER", "Quantité");
    }

    // METHODES DE LA CLASSE

    function getNameItem(){
        // Rôle : Retourner le nom de l'item selon si c'est un produit où une composition
        // Paramètres : Néant
        // Retourne : une chaine de caractères ( le nom de l'item )

        // Si c'est un produit
        if($this->get("type") == "produit"){
            // Retourne le nom du produit
            return $this->getTarget("produit")->getHTML("nom");
        // Sinon si c'est une composition
        }else if($this->get("type") == "composition"){
            // Retourne le nom du menu concerné par cette composition et sa taille 
            return $this->getTarget("composition")->getTarget("menu")->getHTML("nom"). " " . $this->getTarget("composition")->getTarget("taille")->getHTML("libelle");
        }

    }

    function getPrixItem(){
        // Rôle : Retourner le prix de l'item selon si c'est un produit où une composition
        // Paramètres : Néant
        // Retourne : une chaine de caractères ( le prix de l'item )

        // Si c'est un produit
        if($this->get("type") == "produit"){
            // Récupère le prix unitaire et la quantite
            $prixUnitaire = floatval($this->getTarget("produit")->getHTML("prix"));
            $quantite = floatval($this->getHTML("quantite"));
            return number_format(floatval($prixUnitaire * $quantite),2);
        // Sinon si c'est une composition
        }else if($this->get("type") == "composition"){
            // Retourne le prix de la composition
            return $this->getTarget("composition")->getHTML("prix");
        }

    }

    function getNomAccompagnement(){
        // Rôle : Retourne le nom de l'accompagnement de la composition
        // Paramètres : Néant
        // REtourne : une chaine de caractères ( le nom de l'accompagenement )

        return $this->getTarget("composition")->getHTML("accompagnement");
    }

    function getNomBoisson(){
        // Rôle : Retourne le nom de la boisson de la composition
        // Paramètres : Néant
        // REtourne : une chaine de caractères ( le nom de la boisson )

        return $this->getTarget("composition")->getTarget("boisson")->getHTML("nom");
    }

    function getNomSauce(){
        // Rôle : Retourne le nom de la sauce de la composition
        // Paramètres : Néant
        // REtourne : une chaine de caractères ( le nom de la sauce )

        return $this->getTarget("composition")->getTarget("sauce")->getHTML("nom");
    }
}
