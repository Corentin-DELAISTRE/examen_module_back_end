<?php
// Classe commande : gestion des objets commande

class commande extends _lambda { 

    // Nom de la table
    protected $table = "commande";
    
    protected function define() {
        // Création des champs
        $this->addField("date", "DATETIME", "Date");
        $this->addField("statut", "TEXT", "Statut");
    }

    // METHODES DE LA CLASSE

    function getPrixTotalCommande(){
        // Rôle récupérer le prix totale de la commande
        // Paramètres : Néant
        // Retourne : Une chaine de caractère ( le prix total de la commande )

        // Récupérer les éléments de la commande
        $items = new item();
        $allItems = $items->TargetedList("commande",$this->id());
        // Initialisation d'un compteur
        $prixTotal = 0;
        // Pour chaque élément
        foreach ($allItems as $item) {
            // J'ajoute sa quantité multiplié par son prix au compteur
            $prixTotal += floatval($item->getPrixItem());
        }

        // Retourne le prix total avec deux chiffres après la virgule
        return number_format($prixTotal,2);
    }

    function getAllCommandesInOrder(){
            // Rôle : lister les commande à préparer par ordre de date croissant
            // Paramètres : aucuns
            // Retourne : une liste d'objet "commande
    
            // Construction de la requête
            $sql = "SELECT `id`, ". $this->listChamps() . " FROM `$this->table` WHERE `statut` = 'att' ORDER BY `date` ASC";
    
            // Execution
            $liste = $this->sqlToList($sql);
    
            return $liste;
    }

    function getCommandesPrepInOrder(){
        // Rôle : lister les commande préparées par ordre de date croissant
        // Paramètres : aucuns
        // Retourne : une liste d'objet "commande

        // Construction de la requête
        $sql = "SELECT `id`, ". $this->listChamps() . " FROM `$this->table` WHERE `statut` = 'pre' ORDER BY `date` ASC";

        // Execution
        $liste = $this->sqlToList($sql);

        return $liste;
}
}