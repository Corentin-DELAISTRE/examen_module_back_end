<?php

// Template : Selon l'url où on se trouve affiche un message spécifique et redirige vers un autre contrôleur
// Paramètres : $_SERVER["PHP_SELF"] qui donne le nom du contrôleur dans l'url courrante

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Si on vient d'annuler une commande en cours -->
    <?php if ($_SERVER['PHP_SELF'] === "/annuler_commande.php") { ?>
        <meta http-equiv="refresh" content="3; URL='afficher_tableau_de_bord.php'" />
    <?php } ?>
    <!-- Si on vient de valider l'élaboration d'une commande -->
    <?php if ($_SERVER['PHP_SELF'] === "/valider_commande.php") { ?>
        <meta http-equiv="refresh" content="3; URL='afficher_tableau_de_bord.php'" />
    <?php } ?>
    <!-- Si on vient de valider la préparation d'une commande -->
    <?php if ($_SERVER['PHP_SELF'] === "/finaliser_commande.php") { ?>
        <meta http-equiv="refresh" content="3; URL='afficher_tableau_de_bord.php'" />
        <?php } ?>
    <!-- Si on vient de livrer une commande -->
    <?php if ($_SERVER['PHP_SELF'] === "/livrer_commande.php") { ?>
        <meta http-equiv="refresh" content="3; URL='afficher_commandes_preparees.php'" />
    <?php } ?>
    <!-- Si on vient d'ajouter un nouveau menu -->
    <?php if ($_SERVER['PHP_SELF'] === "/ajouter_menu.php") { ?>
        <meta http-equiv="refresh" content="3; URL='afficher_liste_menus.php'" />
    <?php } ?>
    <!-- Si on vient de modifier un menu -->
    <?php if ($_SERVER['PHP_SELF'] === "/modifier_menu.php") { ?>
        <meta http-equiv="refresh" content="3; URL='afficher_liste_menus.php'" />
    <?php } ?>
    <!-- Si on vient de supprimer un menu -->
    <?php if ($_SERVER['PHP_SELF'] === "/supprimer_menu.php") { ?>
        <meta http-equiv="refresh" content="3; URL='afficher_liste_menus.php'" />
    <?php } ?>

    <!-- Si on vient d'ajouter un produit -->
    <?php if ($_SERVER['PHP_SELF'] === "/ajouter_produit.php") { ?>
        <meta http-equiv="refresh" content="3; URL='afficher_liste_produits.php'" />
    <?php } ?>

    <!-- Si on vient de modifier un produit -->
    <?php if ($_SERVER['PHP_SELF'] === "/modifier_produit.php") { ?>
        <meta http-equiv="refresh" content="3; URL='afficher_liste_produits.php'" />
    <?php } ?>

    <!-- Si on vient de supprimer un produit -->
    <?php if ($_SERVER['PHP_SELF'] === "/supprimer_produit.php") { ?>
        <meta http-equiv="refresh" content="3; URL='afficher_liste_produits.php'" />
    <?php } ?>

    <!-- Si on vient de créer un utilisateur -->
    <?php if ($_SERVER['PHP_SELF'] === "/ajouter_utilisateur.php") { ?>
        <meta http-equiv="refresh" content="3; URL='afficher_liste_utilisateurs.php'" />
    <?php } ?>

    <!-- Si on vient de modifier un utilisateur -->
    <?php if ($_SERVER['PHP_SELF'] === "/modifier_utilisateur.php") { ?>
        <meta http-equiv="refresh" content="3; URL='afficher_liste_utilisateurs.php'" />
    <?php } ?>

    <!-- Si on vient de supprimer un utilisateur -->
    <?php if ($_SERVER['PHP_SELF'] === "/supprimer_utilisateur.php") { ?>
        <meta http-equiv="refresh" content="3; URL='afficher_liste_utilisateurs.php'" />
    <?php } ?>

        <link rel="stylesheet" href="/css/styles.css">
        <link rel="stylesheet" href="/css/main.css">
        <title>Message et redirection</title>
</head>

<body>
    <header class="flexwrap align-center spacebetween mb64">
        <div class="flexwrap g16">
            <div class="user-icon"><img src="/assets//images/background_et_icones/user_icon.png" alt="responsive-img"></div>
            <h2><?= session_userconnected()->get("prenom") ?> <?= session_userconnected()->get("nom") ?></h2>
        </div>
        <div class="flexwrap g32">
            <a href="afficher_tableau_de_bord.php">Tableau de bord</a>
            <a href="deconnecter.php">Deconnexion</a>
        </div>
    </header>

    <main>
        <!-- Si on vient d'annuler une commande en cours' -->
        <?php if ($_SERVER['PHP_SELF'] === "/annuler_commande.php") { ?>
            <h1 class="textcenter mb24">Commande annulée !</h1>
            <p class="textcenter">Vous allez être redirigé vers votre tableau de bord...</p>
        <?php } ?>

        <!-- Si on vient de valider l'élaboration d'une commande -->
        <?php if ($_SERVER['PHP_SELF'] === "/valider_commande.php") { ?>
            <h1 class="textcenter mb24">Commande validée !</h1>
            <p class="textcenter">Vous allez être redirigé vers votre tableau de bord...</p>
        <?php } ?>

        <!-- Si on vient de préparer une commande -->
        <?php if ($_SERVER['PHP_SELF'] === "/finaliser_commande.php") { ?>
            <h1 class="textcenter mb24">Commande préparée !</h1>
            <p class="textcenter">Vous allez être redirigé vers votre tableau de bord...</p>
        <?php } ?>

        <!-- Si on vient de livrer une commande -->
        <?php if ($_SERVER['PHP_SELF'] === "/livrer_commande.php") { ?>
            <h1 class="textcenter mb24">Commande livrée !</h1>
            <p class="textcenter">Vous allez être redirigé vers la liste des commandes rpéparées...</p>
        <?php } ?>

        <!-- Si on vient d'ajouter un nouveau menu -->
        <?php if ($_SERVER['PHP_SELF'] === "/ajouter_menu.php") { ?>
            <h1 class="textcenter mb24">Menu ajouté !</h1>
            <p class="textcenter">Vous allez être redirigé vers la liste des menus...</p>
        <?php } ?>

        <!-- Si on vient de modifier un menu -->
        <?php if ($_SERVER['PHP_SELF'] === "/modifier_menu.php") { ?>
            <h1 class="textcenter mb24">Menu modifié !</h1>
            <p class="textcenter">Vous allez être redirigé vers la liste des menus...</p>
        <?php } ?>

        <!-- Si on vient de supprimer un menu -->
        <?php if ($_SERVER['PHP_SELF'] === "/supprimer_menu.php") { ?>
            <h1 class="textcenter mb24">Menu supprimé !</h1>
            <p class="textcenter">Vous allez être redirigé vers la liste des menus...</p>
        <?php } ?>

        <!-- Si on vient d'ajouter un produit -->
        <?php if ($_SERVER['PHP_SELF'] === "/ajouter_produit.php") { ?>
            <h1 class="textcenter mb24">Produit ajouté !</h1>
            <p class="textcenter">Vous allez être redirigé vers la liste des produits...</p>
        <?php } ?>

        <!-- Si on vient de modifier un produit -->
        <?php if ($_SERVER['PHP_SELF'] === "/modifier_produit.php") { ?>
            <h1 class="textcenter mb24">Produit modifié !</h1>
            <p class="textcenter">Vous allez être redirigé vers la liste des produits...</p>
        <?php } ?>

        <!-- Si on vient de supprimer un produit -->
        <?php if ($_SERVER['PHP_SELF'] === "/supprimer_produit.php") { ?>
            <h1 class="textcenter mb24">Produit supprimé !</h1>
            <p class="textcenter">Vous allez être redirigé vers la liste des produits...</p>
        <?php } ?>

        <!-- Si on vient de créer un utilisateur -->
        <?php if ($_SERVER['PHP_SELF'] === "/ajouter_utilisateur.php") { ?>
            <h1 class="textcenter mb24">Utilisateur ajouté !</h1>
            <p class="textcenter">Vous allez être redirigé vers la liste des utilisateurs...</p>
        <?php } ?>

        <!-- Si on vient de modifier un utilisateur -->
        <?php if ($_SERVER['PHP_SELF'] === "/modifier_utilisateur.php") { ?>
            <h1 class="textcenter mb24">Utilisateur modifié !</h1>
            <p class="textcenter">Vous allez être redirigé vers la liste des utilisateurs...</p>
        <?php } ?>

        <!-- Si on vient de supprimer un utilisateur -->
        <?php if ($_SERVER['PHP_SELF'] === "/supprimer_utilisateur.php") { ?>
            <h1 class="textcenter mb24">Utilisateur supprimé !</h1>
            <p class="textcenter">Vous allez être redirigé vers la liste des utilisateurs...</p>
        <?php } ?>
    </main>
</body>

</html>