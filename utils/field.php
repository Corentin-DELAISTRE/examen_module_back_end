<?php

// classe permetant de gérer un objet champ d'un objet de la base de données


class _field {

    protected $name;        // nom du champ
    protected $type;        // type de champ : TXT, DATE, DATETIME, NUM, LINK
    protected $libelle;     // Libellé du champ
    protected $link;        // Objet pointé si lien

    protected $object;      // Objet dont ce champ fait partie

    protected $value;       // valeur de l'objet
    protected $target;       // Objet pointé si chargé


    function __construct($object,$name, $type = null, $libelle  = null, $link = null) {

        //      $object:    objet de ratachement
        $this->object = $object;
        //      $name;        // nom du champ
        $this->name = $name;
        //      $type;        // type de champ : TXT, DATE, DATETIME, NUMBER, LINK 
        //              par defaut : TXT
        $this->type = (empty($type) ? "TXT" : $type); 
        //      $libelle;     // Libellé du champ
        //              par défaut : nom du champ
        $this->libelle = (empty($libelle) ? $libelle : $name);
        //      $link;        // Objet pointé si lien (facultatif)
        //                    si c'est un lien et que link n'est pas précisé,link = name
        //                    sinon si le type de l'objet est "produit" alors link = "produit"
        //                    sinon si le type de l'objet est "composition" alors link = "composition"
        if ($type != "LINK") return;
        $this->link = (!empty($link) ? $link : $name);
    }

    function get() {
        // Role: récupérer la valeur du champ
        // Paramètres : néant
        // Retour : la valeur

        return $this->value;
    }

    function set($value) {
        // Role: changer la valeur du champ
        // Paramètres : 
        //      $value : nouvelle valeur
        // Retour : true si la valeur est accepté, false sinon

        $this->value = $value;
        return true;

        
    }

    function html() {
        // Role: récupérer la valeur HTML du champ
        // Paramètres : néant
        // Retour : la valeur

        return nl2br(htmlentities($this->get()));        
    }

    function type() {
        // Role: récupérer le type du champ
        // Paramètres : néant
        // Retour : le code du type

        return $this->type;           
    }

    function name(){
        // Role: récupérer le nom du champ
        // Paramètres : néant
        // Retour : le code du nom
        return $this->name;
    }

    function libelle($html = true) {
        // Role: récupérer le libelle du champ
        // Paramètres : 
        //      $html : true si on veut le convertir en HTML
        // Retour : le code du libelle  
        
        if ($html) return nl2br(htmlentities($this->libelle));
        else return $this->libelle;
    }

    function link() {
        // Role: Récupérer le lien du champ
        // Paramètres : néant
        // Retour : le lien du champ si le type est 'LINK'
        return $this->link;
    }
}
