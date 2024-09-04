<?php

// Template : Affiche le formulaire de modification des informations d'un utilisateur
// Paramètres : un objet utilisateur

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Formulaire de modification d'un utilisateur</title>
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
        <h1 class="w100 mb32">Modification de l'utilisateur</h1>
        <form action="modifier_utilisateur.php?id=<?=$utilisateur->id()?>" method="POST" class="crud-form flexwrap p32 g32 justcenter">

            <h2 class="textcenter w100">Veuillez mettre à jour les informations suivantes</h2>

            <label class="flexwrap flexcolumn g16 w100">
                <b>Nom de l'utilisateur</b>
                <input type="text" name="nom" id="nom" class="w100 pl8" maxlength="100" required value="<?=$utilisateur->getHTML("nom")?>">
            </label>

            <label class="flexwrap flexcolumn g16 w100">
                <b>Prénom de l'utilisateur</b>
                <input type="text" name="prenom" id="prenom" class="w100 pl8" maxlength="100" required value="<?=$utilisateur->getHTML("prenom")?>"></input>
            </label>

            <label class="flexwrap flexcolumn g16 w100">
                <b>Identifiant de l'utilisateur</b>
                <input type="text" name="identifiant" id="identifiant" class="w100 pl8" maxlength="100" value="<?=$utilisateur->getHTML("identifiant")?>" required>
            </label>

            <label class="flexwrap flexcolumn g16 w100">
                <b>Renseignez l'ancien mot de passe (facultatif)</b>
                <input type="password" name="ancien-mdp" id="ancien-mdp" class="w100 pl8" >
            </label>

            <label class="flexwrap flexcolumn g16 w100">
                <b>Définir un nouveau mot de passe (facultatif)</b>
                <input type="password" name="mdp" id="mdp" class="w100 pl8" >
            </label>

            <label class="flexwrap flexcolumn g16 w100">
                <b>Changer le rôle</b>
                <select name="role" id="role" required>
                    <option value="acc" <?php if($utilisateur->getHTML("role") == "acc"){ ?>selected <?php } ?>>Accueil</option>
                    <option value="pre" <?php if($utilisateur->getHTML("role") == "pre"){ ?>selected <?php } ?>>Préparateur</option>
                    <option value="adm" <?php if($utilisateur->getHTML("role") == "adm"){ ?>selected <?php } ?>>Administrateur</option>
                </select>
            </label>

            <input type="submit" value="Modifier l'utilisateur" class="mlra">
        </form>

    </main>
</body>

</html>