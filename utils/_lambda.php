<?php

/*
Classe _lambda : classe générique de gestion des objets du modèle de données
*/


class _lambda{
 // Attributs :
    // Description du modèle de l'objet (de la table) 

    protected $table = "";       // Nom de la table, à valoriser pour les classes réelles;
    protected $fields = [];      // Liste simple des noms des champs, avec le type de champ

    protected $links = [];      // Liste des liens sortants : 
        //tableau qui pour cahque lien met en index le nom du champ qui est un lien, et en valeur le nom de l'objet
        //  (exemple : [ "fournisseur" => "fournisseur"])


    // Stoker un objet précis
    protected $id = 0;      // id de l'objet chargé
    protected $values = []; // On stockera les valeurs sous la forme [ "nomChamp1" => valeur1, ... ]
    protected $targets = [];    // On stockera pour les liens [ "nomChamp" => objetLié, .. ]
    
    
    
    
    
    // METHODES
    // CONSTRUCTEUR
    
    function __construct($id = null) {
        // Cette fonction se déclenche à chaque fois que l'on instancie un objet (new nomClasse())
        // Les paramètres du constructeur devront être valorisés dans les parenthèse du new nomClasse() 
        // rôle : charger l'objet correspondant à l'id (si non null)
        // paramètre : l'id de la ligne à chargé
        // retour : constructeur, pas de retour

        // définir les champs
        $this->define();

        // Si l'id est non null
        //  Charger l'objet avec cet id
        if ( ! is_null($id)) {
            $this->load($id);
        }

    }

    // Méthode pour aider à créer les champs
    protected function addField($name, $type = null, $libelle = null, $link = null) {
        // Role : ajouter un champ dans l'objet courant
        // Paramètres :
        //      $name : nom du champ
        //      $type : code type du champ
        //      $libelle : libellé
        //      $link : cible (si pertinent, et si omis pour un lien c'est le nom du champ)

        $this->fields[$name] = new _field($this, $name, $type, $libelle, $link);
    }

    protected function define() {
        // Rôle : définir les champs
        // Paramètres : néant
        // Retour : néant
    }

    function is() {
        // Rôle : dire si l'objet est chargé 
        // Paramères : néant
        // Retour : true si il est chargé, false sinon

        // Si l'id vaut null, 0 , chaine vide "", tableau vide []  ou false
        if(empty($this->id)){
            // Retourne false
            return false;
        }else{
            // Sinon retourne true
            return true;
        }

    }









    // GETTERS

    function id() {
        // Rôle : récupérer l'id
        // paramètres : néant
        // Retour : l'id ou O (un nombre entier)

        //L'id est stocké dans l'atttrbut id
        return $this->id;

    }

    function get($fieldName) {
        // Rôle : récupérer la valeur d'un attribut
        // Paramètres : le nom de l'attribut ($fieldName)
        // Retour : la valeur de l'attribut ou chaine vide si l'attribut n'existe pas

        // On a la valeur dans l'attribut values, à l'index qui a le même nom que l'attribut cherché
        // l'attribut values est accessible $this->values
        // l'index qui nous intéresse est dans $fieldName

        // On contrôle que la valeur existe, sinon, on retourne ""
        // Si la valeur existe (isset(....)) retourne la valeur, sinon retourne ""
        if (isset($this->fields[$fieldName])) {
            return $this->field($fieldName)->get();
        } else {
            return "";
        }

    }

    function getTarget($fieldName) {
        // Rôle : retourner l'objet lié à un champ d'un autre objet
        // paramètre : le nom du champ ($fieldName)
        // Retour : objet (d'une classe héritée de la classe _lambda), chargé avec l'objet lié
        //  si le champ est inconnu ou n'est pas un lien : retourne un objet _lambda vide
        //  si le champ est un lien vide (sans valeur associé à ses attributs) : retourne l'objet ciblé mais vide (juste le nom des champs sans les valeurs)

        // l'objet lié à-til déjà été chargé ?
        if (isset($this->targets[$fieldName])) {
            // Si oui alors on le retourne
            return $this->targets[$fieldName];
        }
        
        
        // Est-ce que c'est un lien ?
        if ( $this->field($fieldName)->type() !== "LINK") {
            // Ce n'est pas un lien : on retourne un objet de la classe _lambda
            $this->targets[$fieldName] = new _lambda();
            return $this->targets[$fieldName];
        }
        
        // Si c'est un lien : l'objet pointé est de la classe indiquée dans $this->links[$fieldName]
        $nomClasse = $this->field($fieldName)->link();
        $this->targets[$fieldName] = new $nomClasse($this->field($fieldName)->get());

        return $this->targets[$fieldName];

    }
     // méthode d'accès aux champs
     function getFields() {
        // Rôle : récupérer tous les champs de l'objet
        // paramètres : néant
        // Retour : tableau des champs de l'objet

        return $this->fields;
    }

    function field($fieldName) {
        // Rôle : récupérr l'objet correspondant à un champ
        // Paramètres: 
        //  $fieldName : nom du champ
        // Retour : l'objet champ

        if (isset($this->fields[$fieldName])) {
            // le champ existe, on le retourne
            return $this->fields[$fieldName];
        } else {
            // Sinon, on retourne un champ "fictif"
            return new _field($this, "_");  // on donne les deux param obligatoires
        }
    }


    function getHTML($fieldName){
        // Rôle Recuperer la valeur d'un attribut formaté pour du contenu HTML
        // Paramètres : $fieldName le nom de l'attribut
        // La valeur formaté de l'attribut pour du html
        return nl2br(htmlentities($this->field($fieldName)->get()));
    }

    function datetimeToDate($datetime){
        // Rôle : Mettre au format jj/mm/aaaa un datetime
        // Paramètres : $datetime le datetime
        // Retour la date au format voulu

        $date = new DateTime($datetime);

        return date_format($date, 'd/m/Y');

        
    }

    function dateToDateTime($date){
        // Rôle : Mettre au format yyyy-mm-dd hh:mm une date quelconque
        // Paramètres : la date à transformer $date
        // Retourne : un date time 

        $dateTime = new DateTime($date);

        return date_format($dateTime,'Y-m-d H:i:s');
    }
    
    function datetimeToHour($datetime){
        // Rôle : Mettre au format 12h12 un datetime
        // Paramètres : $datetime le datetime
        // Retour la date au format voulu
        $date = new DateTime($datetime);

        return date_format($date, 'H\hi');
    }







    // SETTERS 

    function set($fieldName, $value) {
        // Rôle : Change la valeur d'un attribut
        // Paramètres : le nom de l'attribut et la valeur
        // Retour : true ou false

        // Il faut stocker la valeur à l'index correspondant à l'attribut de nom $fieldName, dans $this->values
        $this->field($fieldName)->set($value);

        // On retourne true (on a pas d'infos pour vérifier si la valeur est valide, on ne peut que l'accepter)
        return true;
    }


    // Cette fonction n'est pas au point
    function setPOST(){
        
        // Récupère les noms des input et leurs valeurs pour les assigner aux attributs dans la BDD
        // ATTENTION ! : les "name" des inputs doivent être les mêmes que les noms des attributs dans la BDD
        // Paramètres : aucuns
        // Retourne : rien

        foreach($_POST as $name => $value){

            if($name === "mdp"){
                // Si le champ concerne un mot de passe je le crypte avant de l'assigner
                $password = password_hash($value,PASSWORD_DEFAULT);
                $this->values[$name] = $password;
            }else if(stripos("date",$name)){
                // Si le champ concerne une date je la transforme en datetime
                $datetime = $this->dateToDateTime($value);
                $this->values[$name] = $datetime;
            }

            $this->values[$name] = $value;
            
        }
      }









    // SYNCHRONISATION AVEC LA BASE DE DONNEES

   function listChamps() {
        // Rôle : construire la liste des champs de la table pour une requête SELECT
        // Paramètres : néant
        // Retour : texte du type ìd`, `nom`, `prenom`

        $tabFields = [];
        foreach($this->fields as $field){
            $tabFields[] = "`".$field->name()."`";
        }

        return implode(",",$tabFields);
    }

    function makeRequestForMaJ() {
        // Rôle : faire un tableau contenant pour chaque champ, un élément avec le texte `nomChamp` = :nomChamp
        // paramètres : néant
        // Retour : le tableau décrit ci-dessus

        // Faire un tableau : on part d'un tableau vide
        $result = [];

        // Pour chaque champ : ajouter dans $result un élément `nomChamp` = :nomChamp
        foreach($this->fields as $field) {
            // On a le nom du champ dans $nomchamp
            $result[] = "`" . $field->name() . "` = :" . $field->name();
        }
        return implode(", ", $result);
    }

    function ParamsTabForMaJ(){
        // Rôle : construit le tableau des paramètres valorisé pour une requête sql de mise à jour (exemple : insert ou update)
        // Paramètres : aucuns
        // Retourne : le tableau de paramètres
        $params = [];
        // Pour chaque champ l'index du tableau à retourner est ":nomduchamp" et la valeur correspondant à cette index est $field->get()
        foreach($this->fields as $field){
            // Si la valeur du champ est définie alors on l'assigne
            if($field->get() !== null){
                $params += [":".$field->name()=>$field->get()];
            }else{
                // Sinon si c'est un champ de type texte j'assigne une chaine vide
                if($field->type() === "TEXT"){
                    $params += [":".$field->name()=>""];
                    // sinon si c'est un champ de type numerique j'assigne 0
                }else if($field->type() === "NUM"){
                    $params += [":".$field->name()=>0];
                    // sinon si c'est un type datetime j'assigne la date actuelle
                }else if($field->type() === "DATETIME"){
                    $params += [":".$field->name()=>date('Y-m-d H:i:s')];
                    // sinon si c'est un lien j'assigne la valeur null
                }else if($field->type() === "LINK"){
                    $params += [":".$field->name()=>null];
                }
            }
        }

        return $params;
    }

    function sqlExecute($sql, $params = null ){
        // Role : exécuter une requête SQL sur la BDD
        // Paramètres:
        //      $sql : texte de la requête SQL (avec des parametres :xxx)
        //      $param : tableau de valorisation des paramètres de la requête
        // Retour : 
        //      Objet requete exécutée (requête au sens PDO, que l'on pourra donc interroger comme on veut)
        global $bdd;
        $req = $bdd->prepare($sql);
        
        // Si on a des paramètres
        if(! empty($params)){
            if ( ! $req->execute($params)) {
                // On a une erreur de requête (on peut afficher des messages en phase de debug)
                return false;
            }   
        }else{
            if ( ! $req->execute()) {
                return false;
            }
        }
        return $req;    
    }

    function sqlToList($sql, $params = null) {
        // Role : à partir d'une requête SQL et de ses paramètres, génère une liste d'objets
        // Paramètres: Le texte de la requuête SQL + le tableau de paramètres (facultatif)
        // Retour : tableau d'objets de la classe courante (indexés par l'ID)
        $req = $this->sqlExecute($sql,$params);

        // Construire le tableau résultat
        $result = [];
        // tant que j'ai une ligne de résultat de la requête à lire
        while ($tabObject = $req->fetch(PDO::FETCH_ASSOC)) {
            // "transférer" $tabObject en objet de la classe courante
            // Récupération du nom de la classe de l'objet courant
            $classe = get_class($this);
            $obj = new $classe();
            // Charger l'objet
            $obj->loadFromTab($tabObject);
            // ON ajoute cela dans $result
            $result[$obj->id()] = $obj;
        }
        return $result;

    }

    function load($id) {
        // Rôle : chargement de l'objet (de ses attributs) depuis la base de données
        // Paramètres : l'id du contact à charger $id
        // Retour : true si on l'a trouvé, false sinon

        // Construction de la requête + Assigner les paramètres
        $params = [":id"=>$id];
        $sql ="SELECT ". $this->listChamps() . " FROM `$this->table` WHERE `id` = :id";
        //      Préparer / exécuter
        
        $req = $this->sqlExecute($sql,$params);

        // On extrait le résultat (une liste avec un seul élément à l'intérieur)
        $listeExtraite = $req->fetchAll(PDO::FETCH_ASSOC);
        // Si le tableau $liste est vide (0 elt), c'est qu'on a pas l'id cherché
        if (empty($listeExtraite)) {
            return false;
        }

        // On récupère le seul élément de la liste
        $tab = $listeExtraite[0];

        // Pour chaque champ de l'objet, on assigne la valeur correspondante;
        foreach($this->fields as $field) {
            $field->set($tab[$field->name()]);
        }

        // On assigne l'id :
        $this->id = $id;
        return true;

    }

    function insert() {
        // Rôle : création du contact courant dans la base de données
        // paramètres : néant (on utilise les attributs de l'objet)
        // retour : true si réussi, false si échoué

        // Construction de la requête + valorisation des paramètres
        $sql = "INSERT INTO `$this->table` SET " . $this->makeRequestForMaJ();
        $params  = $this->ParamsTabForMaJ();
        // Preparation + exécution
        global $bdd;
        $this->sqlExecute($sql,$params);

        // ne pas oublier d'enregistrer l'id qui a été généré par la BDD
        // il est dnné par la méhode lastInsertId de l'objet $bdd
        $this->id = $bdd->lastInsertId();

        return true;

    }


    function update() {
        // Rôle : mettre à jour l'objet courant dans la base de données
        // Paramètres : néant
        // Retour : true si réussi sinon false

        // Construction de la requête + valorisation des paramètres

        $params = $this->ParamsTabForMaJ();
        $params[":id"] = $this->id;
        
        $sql = "UPDATE  `$this->table` SET " . $this->makeRequestForMaJ() . " WHERE `id` = :id ";

        // Preparation + execution de la requête
        $this->sqlExecute($sql,$params);

        return true;

    }

    function delete() {
        // Rôle : supprimer l'objet de la base de données
        // Paramètres : néant
        // Retour : true ou false

        // Construction de la requête
        $params = [":id" => $this->id];
        $sql = "DELETE FROM `$this->table` WHERE `id` = :id";
    
        // Preparation + execution

        $this->sqlExecute($sql,$params);

        // On passe l'id à zero
        $this->id = 0;

        return true;

    }






    // SYSTEMES DE LISTE

    function listAll(){
        // Rôle : lister tous les éléments d'une classe
        // Paramètres : aucun
        // Retourne : une liste d'objet

        // Construction de la requête
        $sql = "SELECT `id`, ". $this->listChamps() . " FROM `$this->table`";

        // Execution
        $liste = $this->sqlToList($sql);

        return $liste;
    }

    function TargetedList($fieldName,$value){
        // Rôle : lister les éléments d'une classe où un attribut vaut une valeur précise
        // Paramètres : le nom du champ + la valeur recherchée
        // Retourne : une liste d'objet

        // Construction de la requête + Valorisation des paramètres
        $params = [":$fieldName" => $value];
        $sql = "SELECT `id`, ". $this->listChamps() . " FROM `$this->table` WHERE `$fieldName` = :$fieldName";

        // Execution
        $liste = $this->sqlToList($sql,$params);

        return $liste;
    }

    function multiTargetsList($targets = []){
        // Rôle : lister les éléments d'une classe où des attribut valent des valeurs précises
        // Paramètres : Un tableau indexé où pour chaue élément :  l'index = nom du champ et valeur = valeur du champ
        // Retourne : une liste d'objet

        // Je crée un tableau pour stocker les morceaux de reqûete + un tableau d'assignation des paramètres
        $reqTab = [];
        $params = [];
        // Pour chaque élément du tableau target
        foreach ($targets as $fieldsName => $value) {
            // J'ajoute l'assignation du paramètre
            $params += [":$fieldsName" => $value];
            // J'ajoute le morceau de requête dans le tableau
            $reqTab[] .= "`$fieldsName` = :$fieldsName";
        }
        // Construction de la requête
        // On implode le tableau avec le mot "and" comme separateur dans la requête sql
        $req = "SELECT `id`, " . $this->listChamps() . " FROM `$this->table` WHERE " . implode(" and ", $reqTab);
        // Préparation + execution
        $liste = $this->sqlToList($req,$params);
        
        return $liste;
    }








    // CALCULS

    function sommeTotale($tab = []){
        // Rôle : calculer le total d'une somme
        // Paramètres : Un tableau simple où chaque élément est une valeur dans la somme
        // Retourne : un nombre avec 2 chiffre après la virgule

        // Initialisation du total
        $total = 0;
        // pour chaque élément du tableau de valeur
        foreach($tab as $valeur){
            $total += $valeur;
        }

        return number_format($total,2,","," ");
    }



 



    // METHODES DIVERSES

    function objToTabJSON(){
        // Rôle : Prends les attributs de l'objet et leur valeur, les transforme en tableau pouvant être exploité en JSON
        // Paramètres : aucuns
        // Retourne un tableau indexé [nom du champ => valeur du champ]


        // Initialisation du tableau a retourné
        // On place l'id et sa valeur
        $tabJSON = ["id"=>$this->id()];
        
        // Pour chaque champs dans le tableau indexé la clé est le nom du champ et sa valeur est la valeur du champ
        foreach($this->fields as $field){
            $tabJSON[$field->name()] = $field->get();
        }
        // echo du tableau encodé en JSON
        return $tabJSON;
    }

    function loadFromTab($tab) {
        // Rôle : initialiser l'objet (complètement) à partir d'un tableau de données (similaire à celui réupéré par fetch)
        // Paramètres : un tableau indexé ou les clés correspondent aux attributs de l'objet
        // Retour : true si ok, false sinon

        // On charge l'id dans l'objet si on en a un
        if (isset($tab["id"])){
            $this->id = $tab["id"];
        } 

        // Pour chaque champs
        foreach($this->fields as $field) {
            // Si on a dans le tableau une valeur pour un nom de champ
            if (isset($tab[$field->name()])) 
            // cette valeur devient celle pour l'attribut de l'objet qui porte le meme nom que le champ dans le tableau
                $field->set($tab[$field->name()]);
        }
    }

    function verifCompte($identifiant,$mdp){
        // Rôle : verifier si l'identifiant et le mot de passe pour se connecter
        // Paramètres : l'identifiant et le mot de passe renseigné dans le formulaire de connexion par l'utilisateur
        // Retourne : True ou False


        // Construction de la requête
        // Valorisation des paramètres
        $params = [":identifiant"=>$identifiant];

        $sql = "SELECT `id`, ". $this->listChamps() . " FROM `$this->table` WHERE `identifiant` = :identifiant"; 

        // Preparation + Execution de la requête
        $req = $this->sqlExecute($sql,$params);
        // On récupère un tableau avec  un seul élément à l'intérieur ou un tableau vide
        $tabObject = $req->fetchAll(PDO::FETCH_ASSOC);
        // si ce tableau n'est pas vide
        if(!empty($tabObject)){
            // on charge l'objet avec le premier élément du tableau récupéré
            $this->loadFromtab($tabObject[0]);
            // On verifie le mot de passe renseigné
            return $this->verifMdp($mdp);
        }else{
            // Si ce tableau est vide je retourne false
            return false; 
            
        }
        
        
    }

    function verifMdp($mdp){
        // Rôle : vérifie si le mot de passe renseigné par l'utilisateur est bien le bon 
        // Paramètres: le mot de passe en clair renseigné par l'utilisateur
        // Retourne : true si c'est le bon mot de passe , false sinon

        $hash = $this->get("mdp");

        if (password_verify($mdp, $hash)){ 
            return true;
        }else{
            return false;
        }
    }
    
    
    function uploadImageProfil($fichier, $id){
        // Rôle : Charger le fichier dans le dossier fichier et lui donner un nom unique qu'on attribuera au compte d'un utilisateur
        // Paramètres : le fichier en question + l'id de la personne
        // Retour : Rien

        // Vérifier que le fichier est uploader
        if (empty($fichier)) {
            // Erreur : pas de fichier envoyé
            exit;
        }

        // Si on a une erreur
        // Récuperation du code erreur
        $codeErreur = $fichier["error"];
        // Erreur : fichier trop gros
        if ($codeErreur == UPLOAD_ERR_INI_SIZE or $codeErreur == UPLOAD_ERR_FORM_SIZE
        ) {
            echo "Fichier trop volumineux";
            exit;
            // Sinon si autre erreur technique
        } else if ($codeErreur != UPLOAD_ERR_OK) {
            // traitement (message / template)
            echo "Erreur technique";
            exit;
        }

        // Sinon le fichier n'est pas vide

        // On le stocker dans le dossier "./assets/photo_profil", avec un nom aléatoire, 
        $nom = time() . "-" . uniqid();
        // ON conserve l'extension
        // Le nom d'origine est dans $fichier["name"]
        $nom .= "." . pathinfo($fichier["name"], PATHINFO_EXTENSION);

        // On va copier le fichier chargé dans ./assets/photo_profil/$nom
        // Le fichier est dans $fichier["tmp_name"]
        // ON va s'assurer que le répertoire est créé sinon on le crée
        if (!is_dir("assets/photo_profil")) mkdir("assets/photo_profil", 0777, true);
        // vérifier que le nom n'existe pas déjà
        if (file_exists("assets/photo_profil/$nom")) {
            // On cherche un autre nom
            $nom .= "(bis)";
        }

        // Deplacement du fichier téléchargé dans le dossier
        move_uploaded_file($fichier["tmp_name"], "assets/photo_profil/$nom");


        // MàJ du nom de la photo pour l'utilisateur dans la BDD
        
        // Supprimer l'ancienne photo si elle existe
        if (!empty($this->get("photo_profil"))) unlink($this->get("photo_profil"));
        // On déclare la nouvelle
        $this->set("photo_profil", "assets/photo_profil/$nom");
        // On enregistre dans la BDD
        $this->update();
    }



    // MAILS

    function sendMailReinitMdpHTML($exp,$adresseExp,$sujet,$to,$content){

        // Rôle : envoyer un email à une personne
        /* Paramètres : le nom de l'expediteur $exp
                        l'adresse de l'expediteur $adresseExp
                        le sujet $sujet
                        le destinataire $to
                        le contenu (le nom du template HTML) $content
        */
        // Retour : true si mail envoyé, false sinon
        // Gestion de l'expéditeur

        // En-tete : from
        $head = [];
        $head["From"] =  $exp;
        $head["Reply-to"] = $adresseExp;

        // Aouter les infos pour faire un email HTML
        $head["MIME-version"] = "1.0";
        $head["Content-Type"] = "text/html; charset=utf-8";

        // Utilisation du template
        ob_start();
        include "templates/mails/$content";
        $message = ob_get_clean();

        if (mail($to, $sujet, $message, $head)) {
            return true;
        } else {
            return false;
        }
    }





    // METHODES GENERALES LIEES AU PROJET

    function uploadIllustrationMenu($fichier){
        // Rôle : Charger le fichier image dans le dossier concerné et lui donner un nom unique qu'on attribuera au menu approprié
        // Paramètres : le fichier en question
        // Retour : Rien

        // Vérifier que le fichier est uploader
        if (empty($fichier)) {
            // Erreur : pas de fichier envoyé*
            echo "Il n'y a pas de fichier";
            exit;
        }

        // Si on a une erreur
        // Récuperation du code erreur
        $codeErreur = $fichier["error"];
        // Erreur : fichier trop gros
        if ($codeErreur == UPLOAD_ERR_INI_SIZE or $codeErreur == UPLOAD_ERR_FORM_SIZE
        ) {
            echo "Fichier trop volumineux";
            exit;
            // Sinon si autre erreur technique
        } else if ($codeErreur != UPLOAD_ERR_OK) {
            // traitement
            echo "Erreur technique";
            exit;
        }

        // Sinon le fichier n'est pas vide

        // On le stocker dans le dossier "./assets/images/menus", avec un nom aléatoire, 
        $nom = time() . "-" . uniqid();
        // ON conserve l'extension
        // Le nom d'origine est dans $fichier["name"]
        $nom .= "." . pathinfo($fichier["name"], PATHINFO_EXTENSION);

        // On va copier le fichier chargé dans ./assets/images/menus/$nom
        // Le fichier est dans $fichier["tmp_name"]
        // ON va s'assurer que le répertoire est créé sinon on le crée
        if (!is_dir("assets/images/menus")) mkdir("assets/images/menus", 0777, true);
        // vérifier que le nom n'existe pas déjà
        if (file_exists("assets/images/menus/$nom")) {
            // On cherche un autre nom
            $nom .= "(bis)";
        }

        // Deplacement du fichier téléchargé dans le dossier
        move_uploaded_file($fichier["tmp_name"], "assets/images/menus/$nom");


        // MàJ du nom de la photo pour le menu dans la BDD
        
        // Supprimer l'ancienne photo si elle existe
        $cheminAncienneImage = $_SERVER['DOCUMENT_ROOT']."/assets/images".$this->get("image");
        if (!empty($this->get("image"))) unlink($cheminAncienneImage);
        // On déclare la nouvelle
        $this->set("image", "/menus/$nom");
        // On enregistre dans la BDD
        $this->update();
    }

    function uploadIllustrationProduit($fichier){
        // Rôle : Charger le fichier image dans le dossier conerné et lui donner un nom unique qu'on attribuera au produit approprié
        // Paramètres : le fichier en question
        // Retour : Rien

        // Vérifier que le fichier est uploader
        if (empty($fichier)) {
            // Erreur : pas de fichier envoyé
            echo "Il n'y a pas de fichier";
            exit;
        }

        // Si on a une erreur
        // Récuperation du code erreur
        $codeErreur = $fichier["error"];
        // Erreur : fichier trop gros
        if ($codeErreur == UPLOAD_ERR_INI_SIZE or $codeErreur == UPLOAD_ERR_FORM_SIZE
        ) {
            echo "Fichier trop volumineux";
            exit;
            // Sinon si autre erreur technique
        } else if ($codeErreur != UPLOAD_ERR_OK) {
            // traitement
            echo "Erreur technique";
            exit;
        }

        // Sinon le fichier n'est pas vide

        // On le stocker dans le dossier "./assets/images/nom de la catégorie", avec un nom aléatoire, 
        $nom = time() . "-" . uniqid();
        // ON conserve l'extension
        // Le nom d'origine est dans $fichier["name"]
        $nom .= "." . pathinfo($fichier["name"], PATHINFO_EXTENSION);
        // On récupère le libellé de la catégorie
        $categorie = $this->getTarget("categorie")->getHTML("libelle");

        // On va copier le fichier chargé dans ./assets/images/$categorie/$nom
        // Le fichier est dans $fichier["tmp_name"]
        // ON va s'assurer que le répertoire est créé sinon on le crée
        if (!is_dir("assets/images/$categorie")) mkdir("assets/images/$categorie", 0777, true);
        // vérifier que le nom n'existe pas déjà
        if (file_exists("assets/images/$categorie/$nom")) {
            // On cherche un autre nom
            $nom .= "(bis)";
        }

        // Deplacement du fichier téléchargé dans le dossier
        move_uploaded_file($fichier["tmp_name"], "assets/images/$categorie/$nom");


        // MàJ du nom de la photo pour le menu dans la BDD
        
        // Supprimer l'ancienne photo si elle existe
        $cheminAncienneImage = $_SERVER['DOCUMENT_ROOT']."/assets/images".$this->get("image");
        if (!empty($this->get("image"))) unlink($cheminAncienneImage);
        // On déclare la nouvelle
        $this->set("image", "/$categorie/$nom");
        // On enregistre dans la BDD
        $this->update();
    }

}