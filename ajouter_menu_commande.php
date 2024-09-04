<?php 

// Contrôleur : Ajoute le menu créé à la commande en cours et affiche le template du résumé de la commande
// Paramètres : - $_GET l'id de la commande
//              - $_POST les informations renseignées dans le formulaire de création de composition

// Initialisation
include_once "utils/init.php";
session_activation();
include_once "utils/verif_connexion.php";

// Verification du rôle de l'utilisateur : si il n'a pas le rôle "accueil" il est renvoyé a son tableau de bord
if(session_userconnected()->get("role") != "acc"){
    header('Location: afficher_tableau_de_bord.php');
    exit;
}

// Traitement
// Récupération de la commande
$commande = new commande($_GET["id"]);
// Création d'un nouvel objet composition
$composition = new composition();

// Assignation des valeurs pour cette composition
$composition->set("menu",$_POST["menu"]);
$composition->set("taille",$_POST["taille"]);
$composition->set("accompagnement",$_POST["accompagnement"]);
$composition->set("boisson",$_POST["boisson"]);
$composition->set("sauce",$_POST["sauce"]);

// Pour l'assignation du prix il faut connaitre le prix du menu sélectionné
$menu = new menu ($_POST["menu"]);
// Selon la taille sélectionnée le prix de la composition est différent
// Si la taille sélectionnée est "normal"
if($_POST["taille"] == 1){
    // le prix de la composition correspond à celui du menu
    $composition->set("prix",$menu->get("prix"));
// Sinon si la taille sélectionnée est "Maxi"
}else if($_POST["taille"] == 2){
    // On doit rajouter 1,00 € au prix du menu pour avoir celui de la composition
    $prixCompo = floatval($menu->get("prix")) + 1.00;
    $composition->set("prix",$prixCompo);
}

// Insertion de la composition en BDD
$composition->insert();

// Création d'un nouvel élément relié à la commande (item)
$item = new item();
// Assignation de la composition et de la commande à l'élément
$item->set("commande",$commande->id());
$item->set("type","composition");
$item->set("composition",$composition->id());
$item->set("quantite",1);

// Insertion de l'élément
$item->insert();

// Récupération de l'id de la commande
$idCommande = $commande->id();

// Redirection vers le contrôleur affichant le résumé de la commande en cours
header("Location: afficher_resume_commande.php?id=$idCommande");