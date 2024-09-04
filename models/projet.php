<?php
// Classe projet : gestion des objets projet 

class projet extends _lambda { 

    // attributs à valoriser
    protected $table = "projet";               // Nom de la table
    
    protected function define() {
        // Création des champs

        $this->addField("porteur", "LINK", "Porteur du projet");
        $this->addField("gestionnaire", "LINK", "Gestionnaire du projet");
        $this->addField("titre", "TXT", "Titre");
        $this->addField("description","TXT","Description");
        $this->addField("montant_demande","NUM","Montant demandé");
        $this->addField("date_publication","DATETIME","Date de publication");
    }


    // METHODES

    function listFiveLast(){
        // Rôle : lister lister les 5 derniers projets les plus récent de la BDD
        // Paramètres : aucun
        // Retourne : une liste de projet

        // Construction de la requête
        $sql = "SELECT `id`, ". $this->listChamps() . " FROM `$this->table` ORDER BY `date_publication` DESC LIMIT 5";

        // Execution
        $liste = $this->sqlToList($sql);

        return $liste;
    }


    function getNiveauFinancement(){
        // Rôle : Récuperer le niveau de financement du projet sous forme d'un pourcentage
        // Paramètres : Aucuns
        // Retour  : Le niveau de financement du projet en pourcentage

        // Recuperation du montant demandé pour le projet
        $montantDemande = $this->get("montant_demande");
        // Recuperation de toutes les promesses de financement faites pour ce projet
        $promesses = new promesse();
        $listePromesses = $promesses->targetedList("projet",$this->id());

        // Additioner le montant de chaque promesse
        // Initialisation d'un compteur
        $montantPromesses = 0;
        foreach ($listePromesses as $promesse) {
            $montantPromesses += $promesse->get("montant_promis");
        }

        // Diviser le montant des promesses par  le montant voulu

        $niveauFinancement = number_format((100*($montantPromesses / $montantDemande)),2);

        return $niveauFinancement;
    }

    function listAcceptedProject($id){
        // Rôle : Générer la liste de tous les projets accepté par un gestionnaire
        // Paramètres : l'id du gestionnaire
        // Retourne : une liste d'objets projet

        // Construction des paramètres et de la requête

        $params = [":id" => $id];

        $sql = "SELECT `id`, ". $this->listChamps() . " FROM `$this->table` WHERE `gestionnaire` = :id ORDER BY `date_publication` DESC";

        $liste = $this->sqlToList($sql,$params);

        return $liste;
    }

}