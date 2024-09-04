<?php

// Template affichant le formulaire de connexion au back-office
// Paramètres : Néant

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Ecran de connexion</title>
</head>
<body>
    <form action="connecter_utilisateur.php" method="POST" class="flexwrap p32 g32 connexion-form">
        <h2 class="textcenter w100">Veuillez renseigner vos identifiants</h2>
        <label class="flexwrap flexcolumn g16 w100">
            Identifiant
            <input type="text" name="identifiant" id="identifiant" class="w100 pl8">
        </label>

        <label class="flexwrap flexcolumn g16 w100">
            Mot de passe
            <input type="password" name="mdp" id="mdp" class="w100 pl8">
        </label>

        <input type="submit" value="Connexion" class="mlra">
    </form>
</body>
</html>