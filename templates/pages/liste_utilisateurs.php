<?php

// Template : Affiche la liste de tous les utilisateurs 
// Paramètres : une liste d'objets utilisateurs

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Liste des utilisateurs</title>
</head>

<body>
    <header class="flexwrap align-center spacebetween mb64">
        <div class="flexwrap g16">
            <div class="user-icon"><img src="/assets//images/background_et_icones/user_icon.png" alt="responsive-img"></div>
            <h2><?= session_userconnected()->getHTML("prenom") ?> <?= session_userconnected()->getHTML("nom") ?></h2>
        </div>
        <div class="flexwrap g32">
            <a href="afficher_tableau_de_bord.php">Tableau de bord</a>
            <a href="deconnecter.php">Deconnexion</a>
        </div>
    </header>

    <main class="flexwrap g24 pl64 pr64 mb128">
        <h1 class="mb32 w100">Liste des utilisateurs</h1>
        <div class="w100 mb32">
            <a href="afficher_form_ajout_utilisateur.php" class="action-btn">+ Ajouter un nouvel utilisateur</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Rôle</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listeUtilisateurs as $utilisateur) { ?>
                    <tr>
                        <td><?=$utilisateur->id()?></td>
                        <td><?=$utilisateur->getHTML("nom")?></td>
                        <td><?=$utilisateur->getHTML("prenom")?></td>
                        <td><?=$utilisateur->getHTML("role")?></td>
                        <td><a href="afficher_form_modif_utilisateur.php?id=<?=$utilisateur->id()?>"><img src="/assets/images/background_et_icones/editer.png" alt=""></a></td>
                        <td><a href="afficher_demande_conf_supp_utilisateur.php?id=<?=$utilisateur->id()?>"><img src="/assets/images/background_et_icones/supprimer_rouge.png" alt=""></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
    </main>
</body>

</html>
